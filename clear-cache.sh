#!/bin/bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan event:clear
php artisan optimize:clear
echo "All caches cleared"
