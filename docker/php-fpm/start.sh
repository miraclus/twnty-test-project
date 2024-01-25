#!/usr/bin/env bash

set -e

role=${CONTAINER_ROLE:-app}
env=${APP_ENV:-production}

if [ "$env" != "local" ]; then
    echo "Caching configuration..."
    (cd /var/www && php /var/www/artisan config:cache && php /var/www/artisan route:cache && php /var/www/artisan view:cache)
fi

if [ "$role" = "app" ]; then
    exec php-fpm

elif [ "$role" = "queue" ]; then
    echo "Running the queue..."
    php /var/www/artisan queue:work --queue=default,emails --verbose --tries=3 --timeout=90

elif [ "$role" = "scheduler" ]; then

    while [ true ]
       do
         php /var/www/artisan schedule:run --verbose --no-interaction &
         sleep 60
       done

else
    echo "Could not match the container role \"$role\""
    exit 1
fi
