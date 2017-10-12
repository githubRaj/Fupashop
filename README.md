# Welcome to the Fupashop
A sales platform solution that allows users to view catalogs, make purchases, process returns, and other daily vendor ops.

Languages used: PHP, MySQL, HTML, JS.
Development Timeframe: 3 months
Team Members: 10
School: Concordia University
Class: SOEN343

For all project inquiries, please contact Cris Ardelean at c_burns93@yahoo.ca


# First Time Installation Instructions

Since certain files are omitted by default from version control (for good reasons), as specified in .gitignore, the following need to be done on your own machine, the *first time only*, to be up to speed.

* Installing dependencies (start in root folder of clone):
  * `cd fupashop/`
  * If you already installed composer: `composer install`. Otherwise, use provided: `./../composer.phar install`

* Adding the required and usually provided .env file: `cp .env.example .env`
* Generating your own key: `php artisan key:generate`
* RUN composer require "laravelcollective/html":"^5.3.0" for the Admin Panel
* Deploying: `php artisan serve`
* Testing: Check out [your local server](http://localhost:8000)

You should now be able to see the usual Laravel welcome page. Please bring up any issues with these steps with the team.
