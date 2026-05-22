# Deploy Guide — Parallaxnet ID

cPanel deploy reference. Run in order top-to-bottom for first deploy. Skip to section 9 for re-deploys.

## Layout

```
~/parallaxnet/       Laravel app (everything except public/)
~/public_html/       contents of public/ only (web root)
~/public_html/storage  symlink -> ~/parallaxnet/storage/app/public
```

---

## 1. Local — build frontend assets

```powershell
cd "c:\xampp\htdocs\Parallaxnet ID"
npm run build
```

Produces `public/build/manifest.json` + hashed assets. Never run on shared host.

## 2. Local — generate APP_KEY

```powershell
cd "c:\xampp\htdocs\Parallaxnet ID"
php artisan key:generate --show
```

Copy output (looks like `base64:xxxx...`). Paste into prod `.env` step 4.

## 3. Upload files

### Option C — Git deploy via cPanel (recommended for re-deploys)

Two repos — keep in sync on every change:

| Repo | URL | Maps to |
|---|---|---|
| Main project | https://github.com/Azriel-Fajar/parallaxnet-id | `~/parallaxnet/` |
| Public assets | https://github.com/Azriel-Fajar/parallaxnet-id-public | `~/public_html/` |

**Local — push changes:**

```powershell
# Main project (from repo root)
cd "c:\xampp\htdocs\Parallaxnet ID"
git add .
git commit -m "your message"
git push origin master

# Public assets (after npm run build)
cd "c:\xampp\htdocs\Parallaxnet ID\public"
git add .
git commit -m "build: update assets"
git push origin master
```

**cPanel — pull on server:**

1. cPanel → **Git Version Control** → Add Repository
   - Clone URL: `https://github.com/Azriel-Fajar/parallaxnet-id.git`
   - Path: `/home/<cpaneluser>/parallaxnet`
2. Add second repo:
   - Clone URL: `https://github.com/Azriel-Fajar/parallaxnet-id-public.git`
   - Path: `/home/<cpaneluser>/public_html`
3. On each deploy: cPanel → Git Version Control → **Update** (pull) both repos
4. Then run deploy script (step 7) if PHP/composer/migration changed

> **Note:** `public/` has its own git repo (`public/.git/`). The main repo's `.gitignore` excludes `public/` contents — changes to CSS/JS must be committed in both repos separately.

---

### Option A — Zip upload (recommended)

**3a. Build zip locally (PowerShell):**

```powershell
cd "c:\xampp\htdocs\Parallaxnet ID"

# App zip — everything except node_modules, .git, .env, public/
$exclude = @('node_modules', '.git', '.env', 'public', 'parallaxnet_id.zip')
$items = Get-ChildItem -Path . | Where-Object { $exclude -notcontains $_.Name }
Compress-Archive -Path $items.FullName -DestinationPath parallaxnet_id.zip -Force

# Public zip — contents of public/ only
Compress-Archive -Path public\* -DestinationPath parallaxnet_public.zip -Force
```

**3b. Upload via cPanel File Manager:**

1. Upload `parallaxnet_id.zip` → `~/parallaxnet/`
2. Extract in place (File Manager → right-click → Extract)
3. Upload `parallaxnet_public.zip` → `~/public_html/`
4. Extract in place

**3c. Clean up zips on prod (cPanel Terminal):**

```bash
rm ~/parallaxnet/parallaxnet_id.zip ~/public_html/parallaxnet_public.zip
```

---

### Option B — Selective file upload (SFTP)

Two destinations on cPanel via SFTP or File Manager.

**Upload to `~/parallaxnet/`** (everything except `public/`):
- `app/`
- `bootstrap/`
- `config/`
- `database/`
- `resources/`
- `routes/`
- `scripts/`
- `storage/`
- `vendor/` (or skip and run `composer install` on prod)
- `artisan`
- `composer.json`
- `composer.lock`
- `package.json`

**Upload to `~/public_html/`** (contents of local `public/`):
- `index.php`
- `.htaccess`
- `build/` (from step 1)
- `favicon.ico`
- `robots.txt`
- everything else inside local `public/`

**Skip uploading:**
- `node_modules/`
- `.git/`
- `.env` (create fresh on prod)
- `storage/framework/cache/`, `sessions/`, `views/` contents (Laravel creates these)

## 4. Create prod `.env`

Path: `~/parallaxnet/.env`

```env
APP_NAME="Parallaxnet ID"
APP_ENV=production
APP_KEY=base64:PASTE_FROM_STEP_2
APP_DEBUG=false
APP_URL=https://parallaxnet.id

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=CPANEL_DB_NAME
DB_USERNAME=CPANEL_DB_USER
DB_PASSWORD=CPANEL_DB_PASS

FILESYSTEM_DISK=public
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

MAIL_MAILER=log
```

`chmod 600 .env` after upload.

## 5. Create database in cPanel

1. cPanel → **MySQL Databases**
2. Create new DB (note full name, often prefixed `cpaneluser_dbname`)
3. Create new user + strong password
4. Add user to DB with **ALL PRIVILEGES**
5. Fill `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` in `.env`

## 6. Edit `~/public_html/index.php`

Laravel's `index.php` expects app dir as sibling. Re-point to `~/parallaxnet`.

Find these two lines:

```php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
```

Change to:

```php
require __DIR__.'/../parallaxnet/vendor/autoload.php';
$app = require_once __DIR__.'/../parallaxnet/bootstrap/app.php';
```

Also check for `$app->usePublicPath(__DIR__);` block. If present, keep — tells Laravel `public_html` is the public dir.

If absent, add right after `$app = require_once ...`:

```php
$app->usePublicPath(__DIR__);
```

## 7. SSH in → run deploy script

cPanel → **Terminal** (or SSH client):

```bash
cd ~/parallaxnet
chmod +x scripts/deploy.sh
bash scripts/deploy.sh
```

Script runs:
- `composer install --no-dev --optimize-autoloader`
- `php artisan migrate --force`
- `php artisan storage:link`
- removes any existing `~/public_html/storage` and creates symlink → `~/parallaxnet/storage/app/public`
- sets `storage/` + `bootstrap/cache/` permissions
- caches config + routes + views

## 7b. No SSH? Manual equivalent

cPanel **Terminal** still works on most hosts. If totally blocked:

1. Composer: use cPanel **Setup Composer** or pre-bundle `vendor/` from local upload.
2. Migrate: cPanel **phpMyAdmin** → import SQL dump from local (`php artisan schema:dump --prune` then export).
3. Symlink: cPanel **File Manager** → create symbolic link manually, or contact host support.
4. Cache: skip (Laravel boots without cache, just slower).

## 8. Verify deploy

| Check | How |
|---|---|
| Homepage loads | `https://parallaxnet.id` |
| Admin login works | `/admin` |
| CSS/JS load | DevTools → Network → no 404s on `/build/assets/*` |
| Storage symlink works | upload test image via admin |
| New uploads land in storage | `ls ~/parallaxnet/storage/app/public/images/<dir>/` |
| Public URL serves uploads | `https://parallaxnet.id/storage/images/<dir>/<file>` |
| Existing images render | check news/slider/partners pages |
| Hero video lazy-loads | DevTools Network → mp4 should NOT load until scroll |
| Errors logged | `tail -f ~/parallaxnet/storage/logs/laravel.log` |

---

## 9. Re-deploy after code changes

Local:
```powershell
cd "c:\xampp\htdocs\Parallaxnet ID"
npm run build
```

**Upload option — zip (full re-deploy):** repeat step 3 (Option A) to replace all files.

**Upload option — selective (faster):** upload only changed files to `~/parallaxnet/` and `~/public_html/build/`.

Then on prod:
```bash
cd ~/parallaxnet
bash scripts/deploy.sh
```

If only frontend changed: upload `public/build/` only, no script needed.

If migration added: script handles via `migrate --force`.

If composer dependency changed: re-upload `composer.json` + `composer.lock`, script runs `composer install`.

---

## Permissions cheat sheet

```
~/parallaxnet/storage/         755 (dirs) / 644 (files)
~/parallaxnet/bootstrap/cache/ 755
~/parallaxnet/.env             600
~/public_html/                 755
~/public_html/storage          symlink (no chmod needed)
```

Quick reset:
```bash
cd ~/parallaxnet
chmod -R 755 storage bootstrap/cache
find storage -type f -exec chmod 644 {} \;
chmod 600 .env
```

---

## Troubleshooting

| Symptom | Cause | Fix |
|---|---|---|
| HTTP 500, blank page | `.env` missing or `APP_KEY` empty | Set `APP_KEY`, check `.env` exists |
| HTTP 500 + log "permission denied" | `storage/` not writable | `chmod -R 755 storage bootstrap/cache` |
| Images 404 | symlink missing or wrong target | re-run section 7 |
| Images 404 only on old rows | files not uploaded to `storage/app/public/images/` | upload from local |
| CSS/JS missing | forgot `npm run build` | rebuild + upload `public/build/` |
| "Class not found" | `composer install` skipped or stale autoload | `composer install --no-dev -o` |
| Migration fails "table exists" | partial prior deploy | check `migrations` table in DB, mark missing rows or drop offending table |
| Login loops / session lost | `SESSION_DRIVER` mismatch | set `SESSION_DRIVER=database` + ensure `sessions` table migrated |
| Logo / admin avatar broken | hardcoded `asset('storage/...')` paths | already fixed in components using `Storage::url()` |
| Video downloads on page load | browser cache | hard reload (Ctrl+Shift+R); confirm `preload="none"` in DevTools Elements panel |

---

## Quick reference — what runs where

| Command | Run on |
|---|---|
| `npm run build` | Local only |
| `php artisan key:generate --show` | Local only |
| `composer install --no-dev` | Prod (via deploy.sh) |
| `php artisan migrate --force` | Prod (via deploy.sh) |
| `php artisan storage:link` | Prod (via deploy.sh) |
| `php artisan config:cache` | Prod only (never dev) |
| `php artisan config:clear` | Both (if cached config goes stale) |
