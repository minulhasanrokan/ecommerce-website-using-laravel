Installation
Clone the repo

Install Composer packages

user name: admin@gmail.com
pass: 12345

composer install
Copy the environment file & edit it accordingly

cp .env.example .env
Generate application key

php artisan key:generate
Create Database then migrate and seed

php artisan migrate --seed

Linking Storage folder to public

php artisan storage:link
Compile all your assets including a source map

npm install && npm run dev
Serve the application

php artisan serve
Configuration email

add mail configuration in .env
