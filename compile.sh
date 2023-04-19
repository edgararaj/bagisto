#!/bin/bash
php artisan vendor:publish --all --force && pushd packages/Webkul/Velocity/ && npm run dev && popd
