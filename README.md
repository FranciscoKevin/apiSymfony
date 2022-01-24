<h1>apiSymfony</h1>

I will create my own **API with Symfony** with simple request GET and POST
I used **Serializer** and **JSON** in Symfony
<h2>Installation</h2>

Clone the Github repository wherever you want
Install dependencies: `composer install`
Create `DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"` in your **.env** file.
Create a database: `php bin/console d:d:c`
Play the migrations: `php bin/console make:migration then php bin/console d:m:m`
Play the fixtures: `php bin/console d:f:l --no-interaction`
Launch the server: `symfony serve -d` or `php -S localhost:8000 -t public`

<h3 align="left">Languages and Tools:</h3>
<p align="left"> 
    <a href="https://symfony.com" target="_blank" rel="noreferrer">
        <img src="https://symfony.com/logos/symfony_black_03.svg" alt="symfony" width="40" height="40">
    </a>
    <a href="https://www.php.net" target="_blank" rel="noreferrer">
        <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/>
    </a> 
    <a href="https://www.mysql.com/" target="_blank" rel="noreferrer">
        <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/>
    </a>
    <a href="https://postman.com" target="_blank" rel="noreferrer">
        <img src="https://www.vectorlogo.zone/logos/getpostman/getpostman-icon.svg" alt="postman" width="40" height="40"/>
    </a>
</p>