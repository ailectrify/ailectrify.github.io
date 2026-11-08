# Deploy nach Checkdomain (GitHub Actions + SSH/rsync)

Workflow: [`.github/workflows/deploy-checkdomain.yml`](../.github/workflows/deploy-checkdomain.yml)

Start: GitHub → **Actions** → **Deploy Checkdomain** → **Run workflow**.

## Secrets im Repo setzen

Unter https://github.com/ailectrify/ailectrify.github.io/settings/secrets/actions :

| Secret | Inhalt |
|--------|--------|
| `CHECKDOMAIN_HOST` | SSH-Hostname (z. B. `wwwXXX.checkdomain.de` oder IP) |
| `CHECKDOMAIN_USER` | SSH-Benutzer |
| `CHECKDOMAIN_SSH_KEY` | Privater SSH-Key (kompletter PEM-Block inkl. `BEGIN`/`END`) |
| `CHECKDOMAIN_PATH` | Absoluter Pfad zum Document Root (mit trailing slash ok) |
| `CHECKDOMAIN_PORT` | Optional, Standard `22` |

## Server vorbereiten

1. SSH-Zugang bei Checkdomain aktivieren.
2. Öffentlichen Key des Deploy-Keys in `~/.ssh/authorized_keys` des Users eintragen.
3. Zielverzeichnis = Webroot der Domain `ailectrify.io`.
4. Test lokal:

```bash
ssh -i deploy_key -p 22 USER@HOST
# dann:
ls CHECKDOMAIN_PATH
```

## Was wird kopiert?

Alles aus dem Repo-Root **außer** `.git/`, `.github/`, `README.md`, `docs/`, `.gitignore`.

`api/anfrage.php` wird mitdeployed. Option **rsync --delete** im Manual-Run nur nutzen, wenn auf dem Server keine extra Dateien liegen sollen.

## Auto-Deploy bei Push

Im Workflow die auskommentierten `push:`-Zeilen aktivieren, sobald Secrets und ein Probelauf erfolgreich waren.

## Rollback

Vorheriges Release liegt in GitHub (Commits/Tags). Erneut einen älteren Commit auschecken und den Workflow darauf starten — oder Dateien auf dem Server aus Backup wiederherstellen.
