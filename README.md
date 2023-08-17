# Laravel-Blog-Project
## This project is a blog website using Laravel Framework

### Description
In this project, laravel framweork was used to create blog website. Laravel Jetstream was used for login and registration. Using blade, the frontend was created and using livewire search and filter of blogs was implemented. In this project, user cam see all the blogs without login. User can register and login to add blog. User can add, delete, update blog. User can import excel file to add the blogs and export excel file for their blog. In this project admin can add category and oversee users.

### Setup for Project like this
>Make sure that composer is installed in your device, [Composer](https://getcomposer.org/download/)
### Create Project
```
composer create-project laravel/laravel name-of-project
cd name-of-project
php artisan serve
```
### Laravel Jetstream Admin and User Login & Registration Installation
```
1. composer require laravel/jetstream
2. php artisan jetstream: install livewire
3. npm install
4. npm run dev
5. Changes in User table
6. php artisan migrate
```
>You can skip part 5, if you don't want to add any column in your user table. Make sure the add input fields as per the added column.

### Import and Export of Excel File Installation, [Here](https://docs.laravel-excel.com/3.1/getting-started/installation.html)
```
composer require maatwebsite/excel
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config
```

To make import and export file
```
php artisan make:export UsersExport --model=User
php artisan make:import UsersImport --model=User
```
>You can also see documentation of it from link aboave.

### Livewire Installation, [Here](https://laravel-livewire.com/docs/2.x/quickstart)
```
composer require livewire/livewire
```
Livewire Component
```
php artisan make:livewire name-of-component
```

### Project Creation
In this project, login and registration was created using Laravel Jetstream but the dashboard was removed and blog page was added. Login, register and logout logic was implemented in navigation bar by doing some changes. Admin and user were seperated by usertype, which was new column added in the user table which was set 0 as default. O was for user and 1 was for admin. Home controller was made for user and Admin controller for admin. Livewire was used for search and filter where using post model data was sent, using various query using wire model data was binded. Admin was made able add category and see user information.

There are to three folder in the view of resources folder. In which admin folder contains all the admin pages, user folder contains all user pages and livewire for livewire search. In order to navigate to pages route is used.

> While creating project like this you may across many error, make sure to read and research on the error which will help to find solution.

### To clone and run project in your device, [Here](https://dev.to/nobleokechi/how-to-clone-and-setup-laravel-project-from-github-3oe6)
