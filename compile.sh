#!/bin/bash
php artisan optimize:clear && php artisan bagisto:publish --force && php artisan optimize:clear && php artisan cache:clear && pushd packages/Webkul/Velocity/ && npm run dev && popd