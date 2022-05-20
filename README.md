# Laravel-System-CRUD-login-password

Read me:


Data Base has creating with name: pengenharia, if case change in file env.

The system has all, login password and, it is able user to create a account.

Also It has Creation, Read, Update, Delete (CRUD) tables and with join between them.

It is a system of events.

Downloads: It does download of the Xampp, MySQL and of the Visual Studio Core.

Note: Page called showcopy.php has been better, in relation tables of HTML. And, the layout of the page too.

Join it!


E-mail:



breno.r.pantoja@gmail.com

brenopantoja@icloud.com


Breno Pantoja

Code needs to typing in terminal of the Visual Stude Core (I has working with command migrate ):

//It creater Project:

composer creater-project --prefer-dist laravel/laravel projectname

//It runs:

php artisan serve

It has working with data base (Important):

php artisan migrate 

php artisan make:migration create_products_table

php artisan migrate:status

// Update in database: In terminal Visual Studio Core
php artisan migrate:fresh

php artisan make:migration  add_table_name 

	
//exemple:
php artisan make:migration create_products_table

php artisan make:migration  add_category_to_products_table

// It return last migrate

php artisan migrate:rollback

//It can see last migrates:
php artisan migrate:reset

// It does the migrate all tables

php artisan migrate:refresh

 //It needs to creat a model; It is conection betweend application and database
// exemple: php artisan make:model name
php artisan make:model Event 

// It has creatting column in Data Base, in a table (It lacks a column) 
php artisan make:migration add_image_to_events_table

php artisan migrate//update database

//It has creatting other column

 php artisan make:migration add_items_to_events_table

//It has creatting other column in table
php artisan make:migration add_date_to_events_table

//If case to need (jetstrem/liveware) in Laravel
clear//Command to clear the terminal

composer require laravel/jetstream

php artisan jetstream:install liveware 

//It has checking migrate, the tables
php artisan migrate:status

//It has updating Data Base
 php artisan migrate 

//Command is this way:Rigth
php artisan jetstream:install livewire 

// This path to need install node.js: https://nodejs.org/pt-br/download/
npm install
//
npm run dev

in addition: It type in terminal:

composer require laravel/jetstream

//It has checking migrate, the tables
php artisan migrate:status

//It has updating Data Base

 php artisan migrate 

        php artisan jetstream:install livewire
        npm install
        npm run dev
 It  does to link:

http://localhost:8000/login

http://localhost:8000/register


// Relations (one to many) of part

php artisan make:migration add_user_id_to_events_table



php artisan migrate


//It has doing relation many to many in data base:

php artisan make:migration create_events_user_table

php artisan migrate   


php artisan migrate:status

 
