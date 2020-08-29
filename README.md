## Installation Instructions

- Run git clone https://github.com/phyzerbert/my66tv.git
- Create a MySQL database for the project
    - mysql -u root -p
    - create database my66tv;
    - \q
- Copy .env.example to .env
- Configure your .env file
    - APP_NAME=MY66TV
    - DB_DATABASE=my66tv
    - DB_USERNAME=root
    - DB_PASSWORD=null
- Run 'composer update' from the projects root folder.
- From the projects root folder run 'php artisan key:generate'
- Run 'composer dump-autoload'
- From the projects root folder run 'php artisan migrate'
- From the projects root folder run 'php artisan db:seed'
- Run 'php artisan serve'
- Start server at http://localhost:8000
