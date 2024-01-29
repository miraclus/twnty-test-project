## EMPLOYEE NOTIFICATION SYSTEM

### Setup:
1. Clone the repository
2. Run `composer install`
3. Run `npm install`
4. Run `docker composer build up -d`'
5. Run `docker exec -it {php-fpm-container-name} bash`
6. Run `php artisan migrate`
7. Run `php artisan db:seed`
