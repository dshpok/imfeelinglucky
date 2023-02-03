For init project
=======
#### Basic settings:

* Install technologies stack:

> ```
> // Apache 
> $ sudo apt-get update
> $ sudo apt-get install apache2
> $ sudo a2enmod rewrite
> ```

> ```
> // Mysql 
> $ sudo apt-get update
> $ sudo apt-get install mysql-server mysql-client
> $ mysql_secure_installation
> ```

> ```
> // PHP 8.1
> $ sudo add-apt-repository ppa:ondrej/php
> $ sudo apt-get update
> $ sudo apt-get install php8.1 php8.1-mysql libapache2-mod-php8.1
> ```
> ```
> // Composer 
> $ sudo apt update
> $ sudo apt install curl
> $ curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
> $ sudo composer self-update

* Copy `.env.example` to `.env`

#### Adding APP_KEY:
* Run `php artisan key:generate` for generating APP_KEY
* #### Create database:
* Run `php artisan migrate` for creating tables in database
