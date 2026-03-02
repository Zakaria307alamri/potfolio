#!/usr/bin/env sh
set -eu

if [ ! -L public/storage ]; then
  php artisan storage:link || true
fi

if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
  php artisan migrate --force
fi

if [ "${RUN_SEEDERS:-false}" = "true" ]; then
  php artisan db:seed --force
  php artisan module:seed || true
fi

exec php artisan serve --host=0.0.0.0 --port="${PORT:-10000}"
