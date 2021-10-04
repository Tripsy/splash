Build steps

composer create-project laravel/laravel splash/
composer install

    composer require laravel/telescope
    php artisan telescope:install
    php artisan migrate

php artisan serve --port=80

    php artisan make:controller CommercialController --resource --model=Commercial
    php artisan make:controller CategoryController --resource --model=Category

Debugging

http://local.test/telescope

Details

Laravel v8.62.0
PHP v7.4.20
MySql 5.5.5-10.6.4-MariaDB-1:10.6.4+maria~focal

Install

git clone git@github.com:Tripsy/splash.git

Notes

I'm using a database setup as a docker container -> docker-compose.yml :::

```
version: '3.7'
services:
    mysql:
        container_name: mysql
        image: mariadb
        restart: always
        volumes:
            - ./mysql:/var/lib/mysql
        environment:
            MYSQL_DATABASE: 'test'
            MYSQL_ROOT_PASSWORD: 'secret'
            MYSQL_TCP_PORT: 3306
        command: ['--character-set-server=utf8', '--collation-server=utf8_unicode_ci']
        ports:
            - 3306:3306
networks:
    default:
        name: local-coding
```
        
