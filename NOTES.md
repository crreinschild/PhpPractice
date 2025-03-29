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

### Setup

1) Follow the installation steps from the [Tailwind CSS Larvel-Vite Install docs](https://tailwindcss.com/docs/installation/framework-guides/laravel/vite)
   1) NOTE: It appears that Tailwind CSS is at least partially set up in the starting code; @Joe was this intentional?
2) Add `@vite('resources/css/app.css')` to `welcome.blade.php` to apply the css file. (re: last step of the above link)

### Layout

It appears that it's generally best practice to define your layouts separately from the individual pages for consistency
and reuse. Laravel seems to have 2 main options, component and inheritance (classic) based. 

Since I have limited time, I attempt to create a basic layout template that the welcome page will inherit from. This
layout will be where I create the navigation menu and footer.

I followed the documentation on [Blade Layouts](https://laravel.com/docs/12.x/blade#layouts-using-template-inheritance) 
to create a default layout file. From here I will create the navigation menu and footer.

#### Follow-up on Layouts

I went back to using Component-based blade layouts, especially since I started looking at livewire components already.

TODO: Create a page layout so that I can create a consistent, repeatable layout for future pages.

### Navigation Menu

I am struggling with the various examples and starter kits to make pretty navigation menus. I found that I spent way too
much time on this one, so for the time being, I adapted the free navbar example from [Tailwind Plus](https://tailwindcss.com/plus/ui-blocks/application-ui/navigation/navbars)
by removing the bits I didn't need, and using the example AlpineJS from my abandoned `crreinschild/tailwind-breeze`
branch.

TODO: Clean up the navbar and make it more reusable.

### Weather Dashboard Layout

My plan is to create a basic gauge component to show the numbers in squares that can be laid out in a grid, with flex
layout so they can rearrange themselves on smaller (mobile) screens.

But I think I want to get the data from the API first.

### Footer

Following my quest to get through these UI tasks as quickly as possible, I once again found and adapted a design from a
website. This time I used a footer from [Pagedone.io: Tailwind CSS Footer](https://pagedone.io/blocks/marketing/footer).

## Weather API

I have a Weather livewire component that gets a WeatherService instance. The WeatherService handles the API call to the
OpenWeather API. The Weather component is hardcoded to a single location for the time being. I have not yet made the
component call to get the weather data on load, but instead it's hooked up to a button click.

The WeatherService returns the data via a WeatherReport model that should make it easier to abstract the type of weather
data that may be gathered. Though I'm not married to that approach; maybe I'll create a Request object where the live
component can request any combination of data, and have those requested fields loaded/mapped to a response object.

The WeatherService is registered to the container via the WeatherServiceProvider.

## Livewire & Search

I gave this an early start. I generated a new laravel app with the livewire startup kit to use as a reference.

I'll also leave the example counter livewire component around for reference.

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

### Laravel Breeze 

I tried to use Laravel Breeze to get a basic (decent looking) UI, in particular since the generated sample code
included a serviceable navigation menu. However, I did not realize that it was falling out of favor and not necessarily
compatible with never versions of Laravel & Tailwind.

### Logging

I have not yet looked deeply into logging configuration. In order to save time when debugging, I found the error_log()
function. I would love to get logging working correctly so I can add proper logging to the code.

## Self-reflections

### 4-6 Hour Check-in

At 4-6 hours in, I found myself diving into rabbit holes, wanting everything to look good and be perfect when I should
have focused on functionality before prettiness. I could have started with the ugliest UI, so I could jump into the API
and livewire stuff earlier, then gone back.  That's what I'm doing now, but I should have done that at least 2 hours.

The good news is that I'm learning a lot in a very short period of time.

I don't think I'm going to get to all the cool stuff I wanted to do, like TDD, and using docker & dev containers for 
local dev environment setup.

### 7 Hour Check-in

I got a semi-functional UI, I need to switch over to the API. I'm going to try to get that working before bed. If I can
do that, then I'll at least feel a little bit better about my submission.

### Midnight Check-in

The HTTP Request to get a basic weather report is working. Next step is to create a new livewire component to handle the
WeatherSearchService. Also, I would like to create that WeatherGauge component to better display the weather data in an
easy-to-read and flexible layout. I also want to add error handling. 

### Morning Check-in

I'm going to see if I can get the search thing working.
