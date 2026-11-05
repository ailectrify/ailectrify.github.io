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

Aktuell: Deploy auf Checkdomain (PHP nötig für `/api/anfrage.php`).

GitHub Pages allein reicht nicht, solange das Formular PHP nutzt. Mögliche nächste Schritte:

1. Versionierung und CI-Deploy auf Checkdomain
2. Formular auf eine serverless API umstellen, dann GitHub Pages / Cloudflare Pages

## Lokal ansehen

Beliebigen Static-Server im Repo-Root starten, z. B.:

```bash
python3 -m http.server 8080
```

Dann http://localhost:8080 öffnen. Das Kontaktformular braucht PHP und Mail-Setup und funktioniert lokal so nicht.

## Pflege

- Inhaltliche Änderungen idealerweise im Astro-Quellprojekt, dann Build hier einspielen (oder Quellrepo hierher migrieren).
- Nach Deploy Canonical-, Sitemap- und OG-URLs auf `https://ailectrify.io` belassen.
