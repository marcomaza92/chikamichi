# Roadmap

Here are the experiences lived while building this project

# Session 01 - CRUD Laravel - 2017-10-19 - 2017-10-22

* Building CRUD Laravel project:
  - Install *composer* with this tutorial: https://getcomposer.org/download/
  - Set *composer* globally with this tutorial: https://getcomposer.org/doc/00-intro.md#globally
  - Change `composer.phar` to just `composer` to get a more friendly execution of commands
  - `composer create-project --prefer-dist laravel/laravel nameoftheproject` (maybe location in `nameoftheproject` could fit?)
  - First fix: inside `nameoftheproject` folder run `composer require laravelcollective/html` and add what says here: http://itsolutionstuff.com/post/html-form-not-found-in-laravel-5example.html
  - run `php artisan make:migration create_items_table` to create a table in **database/migrations** folder. You need to complete the structure.
  - Then go to **config/database.php** and check database conectivity
  - Create the database in phpmyadmin
  - run `php artisan migrate` to create the table(s) in the database
  - Second fix: check **.env** file in the root folder and modify accordingly to your database configuration.
  - Third fix: check **app/Providers/AppServiceProvider.php** and inside the `boot` method add `Schema::defaultStringLength(191);` and in the top of the file add `use Illuminate\Support\Facades\Schema;`
  - run `php artisan migrate` again (you should be good)
  - go to **app** folder and create your Model.php (where Model is the name of the table you are handling) and add what's here: http://itsolutionstuff.com/post/crud-create-read-update-delete-example-in-laravel-52-from-scratchexample.html (step 2 - app/Item.php) changing accordingly
  - run `php artisan make:controller YourController --resource` to create a controller with the CRUD operations
  - go to **routes/web.php** and add `Route::resource('tnxs','TnxsController');` at the very bottom (see here: http://itsolutionstuff.com/post/crud-create-read-update-delete-example-in-laravel-52-from-scratchexample.html - step 3)
  - Complete the controller with the CRUD operations (see here: http://itsolutionstuff.com/post/crud-create-read-update-delete-example-in-laravel-52-from-scratchexample.html - step 3)
  - Create the views and change accordingly (see here: http://itsolutionstuff.com/post/crud-create-read-update-delete-example-in-laravel-52-from-scratchexample.html - step 4)
  - Deploy in browser with `php artisan serve` in the project folder
  - Bonus I: if you get an error about the **laravel.log** try this (on linux): https://stackoverflow.com/questions/23540083/failed-to-open-stream-permission-denied-error-laravel
  - Bonus II: check if you have everything that states here: https://stackoverflow.com/questions/36460874/laravel-5-errorexception-failed-to-open-stream-permission-denied
  - Bonus III: check your route has the `browser route name` and the `controller name` (in that order): https://laracasts.com/discuss/channels/general-discussion/reflectionexception-class-apphttpcontrollersadminadmincontroller-does-not-exist
  - Bonus IV: Remember to `Use` your models in the corresponding controller (see here: https://stackoverflow.com/questions/29579608/laravel-5-method-all-does-not-exist)
  - Bonus V: Be careful when binding variables in the foreach's view (see here: https://stackoverflow.com/questions/25247600/call-to-undefined-method-illuminate-database-query-builderlinks)

  - On Prod:
    * Remember to install composer (obviously)
    * Make `php composer update` just in case something goes out of sync
    * For faster FTP of the project, zip it and FTP the zip file
    * Don't forget to export and then import your database
    * When migrated remember to move everything from the `public` to the `public_html`. Leave the rest thing in a folder call `laravel` at the same level
    * Also don't forget to edit `index.php` to point to the laravel folder so the app can work
    * Remember to activate `sudo a2enmod rewrite`
    * On the **apache2.conf** verify that you have `AllowOverride All` and **NOT** `AllowOverride None` (htacces won't work if you don't do this)
    * Restart apache with `service apache2 graceful`
    * _voilá_ (I guess)

# Session 02 - Laravel Mix - 2017-11-01 - 2017-11-03 | 2017-11-12 - 2017-11-13

* Setting up Laravel Mix with Bootstrap 4:
  - Download and install Nodejs (install the lastest, not the LTS), check that everything went good and check versions with `node -v` and `npm -v`
  - Inside the project folder run `npm install` (like with any other `package.json`)
  - Download the Bootstrap 4 source code
  - Delete everything related to css and js in the `resources/assets` folder and add the Bootstrap 4 source code (SASS files and all the stuff) folder inside
  - find the file `webpack.mix.js` in the project's root. That will be you configuration file for Laravel Mix (Webpack). Refer to: https://laravel.com/docs/5.5/mix for more details
  - run `npm run dev` or `npm run production` depending on your needs
  - Don't forget to add `mix.browserSync('your-site-or-proxy:your-port');` in the `webpack.mix.js` file to enable **hot reloading**. To activate it run `npm run watch`
* Windows journey:
  - Verify you have Python installed (Yes, you read that right :facepalm:) (Be sure is Python 2.7, OMG)
  - `npm install` will break in Windows. You will need to download `win32-x64-59_binding.node` from here: https://github.com/sass/node-sass/releases. Then add it in `C:\Users\%USER%\AppData\npm-cache\node-sass\4.5.3`

# Session 03 - Bootstrap 4 - 2017-12-11

* Understanding the anatomy of Bootstrap 4:
  - You need to include `bootstrap.scss` and `index.js` in the webpack config to compile them
