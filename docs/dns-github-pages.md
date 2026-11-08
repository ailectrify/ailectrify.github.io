# DNS für GitHub Pages (`ailectrify.io`) — optional / später

**Aktuell:** Produktion bleibt auf Checkdomain. Test läuft unter https://ailectrify.github.io/ (Repo `ailectrify/ailectrify.github.io`), **ohne** Custom Domain.

Diese Anleitung gilt nur, falls die Domain später von Checkdomain auf GitHub Pages umgezogen werden soll. Vorher Formular-Lösung klären (`api/anfrage.php` läuft auf Pages nicht).

## Apex `ailectrify.io` (A-Records)

| Typ | Name | Wert |
|-----|------|------|
| A | `@` | `185.199.108.153` |
| A | `@` | `185.199.109.153` |
| A | `@` | `185.199.110.153` |
| A | `@` | `185.199.111.153` |

Optional AAAA: `2606:50c0:8000::153` … `8003::153`.

## `www.ailectrify.io`

| Typ | Name | Wert |
|-----|------|------|
| CNAME | `www` | `ailectrify.github.io` |

Custom Domain im **Pages-Root-Repo** `ailectrify.github.io` setzen (nicht im Repo `website`), `CNAME`-Datei mit `ailectrify.io`, danach Enforce HTTPS.

## Formular

Nach DNS-Umzug PHP auf Checkdomain für diese Domain weg. Alternativen: Subdomain `api.ailectrify.io` auf Checkdomain, oder serverless Mail (Resend o. Ä.).
