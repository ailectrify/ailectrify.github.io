# ailectrify.io Website

Statische Firmenwebsite von [Ailectrify GmbH](https://ailectrify.io) (Astro-Build).

Lokales Verzeichnis und Git-Remote: **[`ailectrify/ailectrify.github.io`](https://github.com/ailectrify/ailectrify.github.io)**.

## Status

Gebauter Output (HTML/CSS/Assets) plus PHP-Formular-Endpoint.

| Pfad | Zweck |
|------|--------|
| `index.html`, Unterseiten | Statische Seiten |
| `api/anfrage.php` | Formular-Endpoint (PHP/Mail, nur Checkdomain) |
| `_astro/`, `assets/`, `fonts/`, `logo/` | Build-Assets |

## Hosting

| Umgebung | URL | System |
|----------|-----|--------|
| **Produktion** | https://ailectrify.io | Checkdomain (Static + PHP) |
| **Test** | https://ailectrify.github.io/ | dieses Repo (GitHub Pages) |

Formular-Mails nur in Produktion. Auf der Test-URL ist `/api/anfrage.php` nicht nutzbar.

`git push` aktualisiert die Test-Site.

**Inhalt ändern (GitHub-Web):** Schritt-für-Schritt — [docs/anleitung-inhalt-aendern.md](docs/anleitung-inhalt-aendern.md).

**Produktion (Checkdomain):** manuell per GitHub Action deployen — [docs/deploy-checkdomain.md](docs/deploy-checkdomain.md) (Actions → *Deploy Checkdomain*). Dafür SSH-Secrets setzen.

Optionale spätere Domain-Umstellung auf Pages: [docs/dns-github-pages.md](docs/dns-github-pages.md).

## Lokal ansehen

```bash
python3 -m http.server 8080
```

http://localhost:8080 — Formular braucht PHP/Mail und funktioniert lokal so nicht.

## Pflege

- Inhaltliche Änderungen idealerweise im Astro-Quellprojekt, dann Build hier einspielen.
- Canonical-, Sitemap- und OG-URLs auf `https://ailectrify.io` belassen.
