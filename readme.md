# foravel

Simple Forum Software built using the Laravel PHP Framework

## Attribution

Grateful to use:


* [Laravel](https://github.com/laravel/laravel)
* [Sluggable](https://github.com/cviebrock/eloquent-sluggable)
* ~~[SEO Tools](https://github.com/artesaos/seotools/)~~ - Coming Soon
* [Breadcrumbs](https://github.com/davejamesmiller/laravel-breadcrumbs/)
* [BBCode Parser](https://github.com/golonka/bbcodeparser)

## Installation for Testing Purposes

* ```git clone https://github.com/MadMikeyB/foravel.git```
* ```composer install```
* ```mv .env.example .env```
* make a database (mysql, sqlite, etc) and set those details in the .env file.
* if you choose sqlite, you have to edit config/database.php and change the driver here, and create the sqlite file inside storage/
* ```php artisan migrate```
* ```php artisan key:generate```
* visit localhost/foravel/public (or wherever you cloned the repo to)
* Register a user and play

NB: Initial Forum Creation must be done through the Database, add a row to the forums table. Forum rows with a `parent` of `0` will be treated as categories.

## License

Copyright [2016] [Michael Burton](http://mikeylicio.us)
