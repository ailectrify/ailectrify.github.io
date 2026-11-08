# ailectrify.io Website

Statische Firmenwebsite von [Ailectrify GmbH](https://ailectrify.io) (Astro-Build).

## Status

Dieses Repository ist die **Arbeitskopie / Quelle** (gebauter Output + PHP-Formular).

| Pfad | Zweck |
|------|--------|
| `index.html`, Unterseiten | Statische Seiten |
| `api/anfrage.php` | Formular-Endpoint (PHP/Mail, nur Checkdomain) |
| `_astro/`, `assets/`, `fonts/`, `logo/` | Build-Assets |

## Hosting

| Umgebung | URL | System |
|----------|-----|--------|
| **Produktion** | https://ailectrify.io | Checkdomain (Static + PHP) |
| **Test** | https://ailectrify.github.io/ | GitHub Pages Root-Repo [`ailectrify.github.io`](https://github.com/ailectrify/ailectrify.github.io) |

Das Projekt-Repo `website` wird **nicht** für Pages genutzt (`/website/` würde Root-Asset-Pfade brechen). Der Test läuft bewusst ohne Custom Domain, damit Produktion unberührt bleibt.

Formular-Mails funktionieren nur in Produktion (Checkdomain). Auf der Test-URL schlägt `/api/anfrage.php` fehl bzw. ist nicht sinnvoll nutzbar.

Optionale spätere Domain-Umstellung auf Pages: [docs/dns-github-pages.md](docs/dns-github-pages.md).

## Sync Test-Hosting

Nach Änderungen hier:

```bash
git push origin main
git push pages main   # Remote → ailectrify/ailectrify.github.io
```

## Lokal ansehen

```bash
python3 -m http.server 8080
```

http://localhost:8080 — Formular braucht PHP/Mail und funktioniert lokal so nicht.

## Pflege

- Inhaltliche Änderungen idealerweise im Astro-Quellprojekt, dann Build hier einspielen.
- Canonical-, Sitemap- und OG-URLs auf `https://ailectrify.io` belassen.
