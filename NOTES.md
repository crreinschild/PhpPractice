# Notes

## Local Environment

Here are a few notes about my local dev setup

### Laravel Herd

I had already installed Laravel Herd in Windows. There's numerous options for getting things set up, but the free 
version of [Laravel Herd for Windows](https://herd.laravel.com/windows) seems like a good start.

### IDE - PhpStorm

For this assessment, I decided to use PhpStorm as my chosen IDE. The two main reasons are: 1) it appears to be a very
popular tool within the Php community with strong support, 2) I subscribe to Jetbrains Ultimate for personal use, so
it's available.

#### Adapted Steps

1) For the `composer install` step, I clicked the button via the PhpStorm notification.
2) Ditto for the `npm install` step.
3) Completed the other steps in the terminal

## Part 1: Tailwind CSS 

1) Follow the installation steps from the [Tailwind CSS Larvel-Vite Install docs](https://tailwindcss.com/docs/installation/framework-guides/laravel/vite)
   1) NOTE: It appears that Tailwind CSS is at least partially set up in the starting code; @Joe was this intentional?
2) Add `@vite('resources/css/app.css')` to `welcome.blade.php` to apply the css file. (re: last step of the above link)


## Issues

Here are a list of challenges I encountered and my resolution.

### Failed to listen; reason ?

When trying to run the application, I would see this error:

`Failed to listen on 127.0.0.1:8000 (reason: ?)`

This appears to be an issue with Laravel Herd Windows installs: 
https://stackoverflow.com/questions/78583889/php-artisan-serve-failed-to-listen-on-127-0-0-18000-reason

I followed the above stackoverflow to resolve:

1) Run `php --ini` to find the loaded ini file.
2) Edit the value of `variables_order` to `GPCS` and save.

### No SQLite Database

For initial setup, such that we don't need to deploy a full database, sqlite is used as default. If this is the first
time running Php applications locally, sqlite may not be set up.

According to the [Laravel database page, sqlite section](https://laravel.com/docs/12.x/database#sqlite-configuration)
the easiest way to fix this is to create a `database.sqlite` file, and then 
[run the migrations](https://laravel.com/docs/12.x/migrations#running-migrations) with `php artisan migrate`

### No CSS loading or Internal Server Error - ViteManifestNotFoundException  

When it says "run `npm run dev` to compile assets, it turns out that you can (and maybe should) leave it running while
also running `php artisan serve`. I suspect there is a way to run both, but for the time being, I run each in a separate
terminal.
