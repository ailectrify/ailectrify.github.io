# DNS für GitHub Pages (`ailectrify.io`)

GitHub Pages ist im Repo konfiguriert. Die **Root-Pfade** (`/_astro/...`, `/fonts/...`) funktionieren erst, wenn die Domain auf GitHub zeigt — nicht unter `…github.io/website/`.

## Bereits erledigt (GitHub)

- Pages: Branch `main`, Ordner `/`
- Custom Domain: `ailectrify.io` (Datei `CNAME` im Repo)
- HTTPS Enforce nach erfolgreicher Domain-Prüfung in Settings → Pages aktivieren

## Bei Checkdomain umstellen (DNS)

Aktuell zeigt `ailectrify.io` noch auf Checkdomain (`185.3.235.231`). Für GitHub Pages ersetzen:

### Apex `ailectrify.io` (A-Records)

| Typ | Name | Wert |
|-----|------|------|
| A | `@` bzw. leer | `185.199.108.153` |
| A | `@` | `185.199.109.153` |
| A | `@` | `185.199.110.153` |
| A | `@` | `185.199.111.153` |

Optional IPv6 (AAAA):

| Typ | Name | Wert |
|-----|------|------|
| AAAA | `@` | `2606:50c0:8000::153` |
| AAAA | `@` | `2606:50c0:8001::153` |
| AAAA | `@` | `2606:50c0:8002::153` |
| AAAA | `@` | `2606:50c0:8003::153` |

Alte A-Records auf `185.3.235.231` entfernen.

### `www.ailectrify.io` (empfohlen)

| Typ | Name | Wert |
|-----|------|------|
| CNAME | `www` | `ailectrify.github.io` |

Hinweis: Ziel ist **`ailectrify.github.io`** (ohne `/website`).

## Prüfen

```bash
dig ailectrify.io +noall +answer -t A
# erwartet: die vier 185.199.108–111.153

dig www.ailectrify.io +nostats +nocomments +nocmd
# erwartet: CNAME → ailectrify.github.io
```

DNS kann bis zu 24 h brauchen. Danach in GitHub: Settings → Pages → Domain-Status grün, **Enforce HTTPS** an.

## Formular / PHP

Nach dem DNS-Umzug läuft **kein PHP** mehr auf Checkdomain für diese Domain.

`/api/anfrage.php` und das Gesprächsformular brauchen vorher eine Alternative (z. B. Formspree, Resend + Worker), sonst bricht der Mail-Versand ab.

Optional: Formular-API vorübergehend auf einer Subdomain belassen (`api.ailectrify.io` → Checkdomain), während die Website auf Pages liegt.
