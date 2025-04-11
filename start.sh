#!/bin/bash
docker compose down
docker compose build app
docker compose up -d
# docker compose exec app bash

#run laravel server
#php artisan serve --host=0.0.0.0 --port=8000
# docker compose exec app php artisan serve --host=0.0.0.0 --port=8000

