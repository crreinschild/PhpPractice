# Php Weather App (Practice)

This is a practice project where I learn how to develop in Php in the Laravel web framework.

### Languages & Tools & Frameworks

- PHP
- Laravel
- AlpineJS
- TailwindCSS
- PhpStorm

### TODO

- Introduce Dockerfile and Docker Compose File for running the application in docker
- Set up a Dev container specification file
- Remove the Search and Refresh buttons entirely so that you can dynamically search and select locations and see automatically refreshed weather selected location.
- Deploy to my web server for demonstration purposes
- Improve accessibility
- Replace copy-pasted styles with my own

## Overview

This application pulls weather data from the [Open-meteo Free Weather API](https://open-meteo.com/) and displays that data in a mobile-friendly web application built in PHP Laravel. 

### Features

- Search for a location to load weather data for.
- Fetch the weather data for a selected location.

## Pre-setup instructions

1. **Install PHP.** Follow instructions on PHP's website. [link](https://www.php.net/manual/en/install.php)
2. **Install NodeJS.** Follow instructions on NodeJS's website. [link](https://nodejs.org/en/download)

### Windows Shortcut

If you're running Windows or OSX, you can install [Laravel Herd](https://herd.laravel.com/) which can install everything you need to start.

> Note: In windows, you may run into an issue with Laravel Herd. [Check this StackOverflow post for assistance](https://stackoverflow.com/questions/78583889/php-artisan-serve-failed-to-listen-on-127-0-0-18000-reason).

## Setup Instructions

1. **Clone the repository:**
    ```bash
    git clone <repo_url>
    cd PhpPractice
    ```

2. **Install Composer dependencies:**
    ```bash
    composer install
    ```

3. **Install NPM dependencies:**
    ```bash
    npm install
    ```

4. **Run compilation service:** 
    > Note: Run in a separate terminal so that it can run in the background
    ```bash
    npm run dev
    ```

5. **Environment Setup:**
    - Copy the example environment file:
        ```bash
        cp .env.example .env
        ```
    - Generate the application key:
        ```bash
        php artisan key:generate
        ```

6. **Run the application:**
    > Note: Run in a separate terminal so that it can run in the background
    ```bash
    php artisan serve
    ```

7. **Open your browser** and navigate to `http://localhost:8000`.
