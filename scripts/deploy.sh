#!/usr/bin/env bash
# Parallaxnet ID — cPanel deploy script.
#
# Assumed layout:
#   ~/parallaxnet/          Laravel app (storage, app, vendor, .env, ...)
#   ~/public_html/          web root, contains only the contents of public/
#
# Run from anywhere; the script switches to ~/parallaxnet first.
set -eu

APP_DIR="$HOME/parallaxnet"
PUBLIC_DIR="$HOME/public_html"

cd "$APP_DIR"

# Dependencies + DB
~/bin/composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan db:seed --class=CourseCategorySeeder --force
php artisan db:seed --class=CourseSeeder --force

# Storage symlink — default location (~/parallaxnet/public/storage)
php artisan storage:link

# Re-point public_html/storage to the real storage/app/public.
# Required because public_html (not ~/parallaxnet/public) is the web root on cPanel.
rm -f "$PUBLIC_DIR/storage"
ln -s "$APP_DIR/storage/app/public" "$PUBLIC_DIR/storage"

# Permissions
chmod -R 755 storage bootstrap/cache
find storage -type f -exec chmod 644 {} \;

# Laravel cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Deploy finished."
