## Testly

Testly is a platform designed to connect companies and early adopters for seamless product testing and valuable feedback. Businesses can create tailored test projects to evaluate prototypes, while users participate in short tasks, share insights, and earn rewards.
This is an MVP.

## Requirements

This project uses Laravel 11 and PHP version 8.3. 
No special requirements for the environment. 

## Dev Installation instructions

- Create a directory for the project and cd into it
- Clone the project into this directory `git clone https://github.com/argareeva/testly.git  .`
- run `composer install`
- Create a .env for your dev environment: `cp .env.example .env` and adjust the settings (local domain, database, etc)
- Set the encryption key in the .env: `php artisan key:generate`
- If you use sqlite: do execute `touch database/database.sqlite`
- Migrate the tables: `php artisan migrate`
- Seed date: `php artisan db:seed`

## Check the deployed app

- Go to the https://testly.harbourspace.site/
- Log in with albina@gmail.com, test
