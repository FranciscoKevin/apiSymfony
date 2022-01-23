<h1>apiSymfony</h1>

I will create my own **API with Symfony** and use **API PLATFORM**

<h2>Installation</h2>

- Clone the Github repository wherever you want
- Install dependencies: `composer install`
- Create `DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"` in your **.env** file.
- Create a database: `php bin/console d:d:c`
- Play the migrations: `php bin/console make:migration then php bin/console d:m:m`
- Play the fixtures: `php bin/console d:f:l --no-interaction`
- Launch the server: `symfony serve -d` or `php -S localhost:8000 -t public`
