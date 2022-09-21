web: vendor/bin/heroku-php-apache2 public/
release: php artisan migrate:refresh --force && php artisan db:seed --force && php artisan storage:link