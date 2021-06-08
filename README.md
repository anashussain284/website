<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Website

## How to use it...

Clone the repository

    git clone https://github.com/anashussain284/website.git

Switch to the project folder

    cd website

Start the apache server & mysql

    sudo /opt/lampp/lampp start

Allow permission to the storage folder

    sudo chmod -R 777 storage

Allow permission to the bootstrap/cache folder

    sudo chmod -R 777 bootstrap/cache

Install all the dependencies using composer

    composer install
    
Run the database migrations (Set the database connection in .env before migrating)

    php artisan migrate