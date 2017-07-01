# REST test

A simple example application to demonstrate:

1. Laravel REST api
2. Angular JS front-end

### Steps to run
* Install php dependencies:

`composer install`

* Update .env file (use .env.example) - re-save as '.env' with database details added to this section:

```
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=rest-test  
DB_USERNAME=username 
DB_PASSWORD=password  
```
* Migrate / seed database:

`php artisan migrate --seed`

* Serve application from '/public' directory (.htaccess is set up to direct all requests to public/index.php)

NB - the javascript / SASS files are pre-built into the assets folder in the /public directory - the original files are in the /resources/assets diretory (this includes the separate controller / service files used to create the Angular JS app).

[Live example](http://joest.one)