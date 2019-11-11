<p align="center">

This is a test Laravel 5.8 project

Installation:

1. Clone this repo

2. Run composer update

3. Set local database, save DB config in .env, for example

DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=test
DB_USERNAME=postgres
DB_PASSWORD=12345

4. Run php artisan migrate

5. Run php artisan db:seed, which created a user with username: admin@test.com and password: 12345

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
