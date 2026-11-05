<?php
// Anfrage-Endpunkt für ailectrify.io auf Checkdomain (PHP-Gegenstück zu tools/anfrage-service/server.js).
// Nimmt das Formular von /gespraech/ entgegen, prüft Pflichtfelder, Honeypot und Ratenlimit und sendet eine E-Mail.
declare(strict_types=1);

const MAIL_TO   = 'info@ailectrify.io';
const MAIL_FROM = 'website@ailectrify.io';   // muss eine Adresse der eigenen Domain sein (sonst blockt der Mailserver)
const ORIGIN    = 'https://ailectrify.io';

function antwort(int $code, string $text = '', ?array $json = null): void {
    http_response_code($code);
    if ($json !== null) { header('Content-Type: application/json; charset=utf-8'); echo json_encode($json); }
    else { header('Content-Type: text/plain; charset=utf-8'); echo $text; }
    exit;
}
function sauber(mixed $s): string { return mb_substr(trim(preg_replace('/[\r\n]+/', ' ', (string)($s ?? ''))), 0, 500); }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Allow: POST'); antwort(405, 'Nur POST'); }

// Ratenlimit: max. 10 Anfragen je IP und Stunde (Datei im temporären Verzeichnis)
$ip = $_SERVER['REMOTE_ADDR'] ?? 'x';
$datei = sys_get_temp_dir() . '/ail_rate_' . md5($ip);
$jetzt = time();
$zeiten = is_file($datei) ? array_filter(array_map('intval', explode(',', (string)file_get_contents($datei))), fn($t) => $jetzt - $t < 3600) : [];
$zeiten[] = $jetzt;
@file_put_contents($datei, implode(',', $zeiten));
if (count($zeiten) > 10) antwort(429, 'Zu viele Anfragen');

if (!empty($_POST['website'])) antwort(200, 'ok'); // Honeypot: still wie ein Erfolg

$a = [
    'name'          => sauber($_POST['name'] ?? ''),
    'unternehmen'   => sauber($_POST['unternehmen'] ?? ''),
    'email'         => sauber($_POST['email'] ?? ''),
    'mitarbeitende' => sauber($_POST['mitarbeitende'] ?? ''),
    'anlass'        => sauber($_POST['anlass'] ?? ''),
    'wunschzeit'    => sauber($_POST['zeit'] ?? ''),
    'quelle'        => sauber($_POST['quelle'] ?? ''),
];
if ($a['name'] === '' || $a['unternehmen'] === '' || $a['anlass'] === '' || !filter_var($a['email'], FILTER_VALIDATE_EMAIL)) {
    antwort(400, 'Pflichtfelder fehlen');
}

$betreff = 'Website-Anfrage: ' . $a['unternehmen'] . ' (' . $a['mitarbeitende'] . ')';
$text = "Name: {$a['name']}\nUnternehmen: {$a['unternehmen']}\nE-Mail: {$a['email']}\nMitarbeitende: {$a['mitarbeitende']}\n"
      . "Anlass: {$a['anlass']}\nWunschzeit: {$a['wunschzeit']}\nQuelle: {$a['quelle']}\nZeit: " . date('c');
$header = [
    'From' => MAIL_FROM,
    'Reply-To' => $a['email'],
    'Content-Type' => 'text/plain; charset=UTF-8',
    'X-Mailer' => 'ailectrify-anfrage',
];
$ok = mail(MAIL_TO, '=?UTF-8?B?' . base64_encode($betreff) . '?=', $text, $header);
if (!$ok) antwort(502, 'Mailversand fehlgeschlagen');

if (str_contains($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json')) antwort(200, '', ['ok' => true]);
header('Location: ' . ORIGIN . '/gespraech/?gesendet=1#anfrage', true, 303);
exit;
