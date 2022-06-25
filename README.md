# Laravel Application

> Laravel project of entertainment center.
> Website and admin panel with CRUDs and dynamically changeable pages.
> Works with Halyk Bank EPAY API

## Quick Start

```bash
# download or clone repository
https://github.com/snakeshaker/entertainment.git

# install dependencies
composer install
npm install 

# copy file .env
copy .env.example .env

# generate a key
php artisan key:generate

# create a new mysql database via phpmyadmin or GUI

# import to created database file
static/database.sql

# database configuration
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password

# list of users
static/settings.txt
```
