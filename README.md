# ailectrify.io Website

Statische Firmenwebsite von [Ailectrify GmbH](https://ailectrify.io) (Astro-Build).

## Status

Dieses Repository enthält den **gebauten Output** (HTML/CSS/Assets) sowie den PHP-Endpunkt für das Kontaktformular.

| Pfad | Zweck |
|------|--------|
| `index.html`, Unterseiten | Statische Seiten |
| `api/anfrage.php` | Formular-Endpoint (PHP/Mail, Checkdomain) |
| `_astro/`, `assets/`, `fonts/`, `logo/` | Build-Assets |

Produktive Domain: **https://ailectrify.io**

## Hosting

**GitHub Pages** ist aktiv (Branch `main`, Custom Domain `ailectrify.io`).

| URL | Rolle |
|-----|--------|
| https://ailectrify.github.io/website/ | Preview (ohne Domain: CSS-Pfade kaputt, weil Root-Build) |
| https://ailectrify.io | Ziel nach DNS-Umstellung |

DNS-Schritte und Checkliste: [docs/dns-github-pages.md](docs/dns-github-pages.md).

**Wichtig:** Solange DNS noch auf Checkdomain zeigt, bleibt die Live-Site dort. Nach dem Umzug auf Pages funktioniert `/api/anfrage.php` nicht mehr — Formular vorher ersetzen oder auf Subdomain belassen.

## Lokal ansehen

Beliebigen Static-Server im Repo-Root starten, z. B.:

```bash
python3 -m http.server 8080
```

Dann http://localhost:8080 öffnen. Das Kontaktformular braucht PHP und Mail-Setup und funktioniert lokal so nicht.

## Pflege

- Inhaltliche Änderungen idealerweise im Astro-Quellprojekt, dann Build hier einspielen (oder Quellrepo hierher migrieren).
- Nach Deploy Canonical-, Sitemap- und OG-URLs auf `https://ailectrify.io` belassen.
