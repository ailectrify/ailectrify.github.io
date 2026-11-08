# Anleitung: Website-Inhalt ändern und veröffentlichen

Stand: 08.11.2026

**Wichtig:** Das aktive Repository ist [`ailectrify/ailectrify.github.io`](https://github.com/ailectrify/ailectrify.github.io). Dort ändern und committen — nicht das archivierte Repo `website`.

| Umgebung | URL | Aktualisierung |
|----------|-----|----------------|
| Test | https://ailectrify.github.io/ | automatisch nach Commit auf `main` |
| Produktion | https://ailectrify.io | manuell per GitHub Action „Deploy Checkdomain“ |

---

## 1. Datei im Repo öffnen

1. https://github.com/ailectrify/ailectrify.github.io öffnen  
2. Zur gewünschten Seite navigieren, z. B. Ordner `ueber-uns` → Datei `index.html`  
3. Datei anklicken

## 2. Im Browser bearbeiten (Edit in place)

1. Auf das Stift-Symbol (**Edit this file** / Bearbeiten) klicken  
2. Text direkt in der Datei ändern  
   - Beispiel: akademischen Titel ergänzen (`Prof. Dr.`, `Prof. Dr. rer. nat.`, …)  
   - Oft an **zwei Stellen** nötig (Fließtext und z. B. Bild-`alt`-Text)  
3. Änderungen prüfen

## 3. Commit auf GitHub

1. Rechts (oder unten) **Commit changes**  
2. Kurze Commit-Nachricht schreiben, z. B. `Titel Stefan Fischer korrigiert`  
3. Commit auf Branch **`main`** bestätigen  

Nach kurzer Wartezeit (meist 1–2 Minuten) ist die Änderung auf der **Test-Seite** sichtbar:  
https://ailectrify.github.io/ (entsprechende Unterseite, z. B. `/ueber-uns/`)

## 4. Produktion auf Checkdomain deployen

Die Live-Site https://ailectrify.io aktualisiert sich **nicht** von allein.

1. Im gleichen Repo den Tab **Actions** öffnen  
2. Links den Workflow **Deploy Checkdomain** auswählen  
3. **Run workflow** klicken  
4. Branch `main` belassen  
5. Option „rsync --delete“ in der Regel **aus** lassen  
6. Nochmal **Run workflow** bestätigen  

Wenn der Lauf grün ist: auf https://ailectrify.io die geänderte Seite prüfen.

---

## Kurzablauf

1. In `ailectrify.github.io` Datei öffnen und bearbeiten  
2. Commit auf `main`  
3. Test auf https://ailectrify.github.io/ prüfen  
4. Actions → **Deploy Checkdomain** → Run workflow  
5. Live auf https://ailectrify.io prüfen  

---

## Hinweise

- Formular „Gespräch anfragen“ funktioniert nur auf **ailectrify.io** (PHP auf Checkdomain), nicht auf der GitHub-Test-URL.  
- Details zum Deploy-Workflow und Secrets: [deploy-checkdomain.md](deploy-checkdomain.md)  
- Später kann der Deploy bei Bedarf stärker automatisiert werden (z. B. Auto-Deploy bei Push auf `main`).
