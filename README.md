# Bike Service Application using Laravel 10

Bike Service App is a web application built with Laravel 10 framework to manage bike servicing appointments, track bike service history, and streamline communication between customers and service station owner.

## Features
**Service Station owner side**
-Register and login new owners 
-Create new avaliable services,edit,delete.
-show booked services by customer on particular date
-Booked services status and history tracking
-update the service status pending,ready for delivery,completed
-email notification for ready for delivery into customer side

**Customer side**
-Register and login new customers
-Book the avaliable services posted by owner on particular date
-Booked services status and history tracking
-service status pending,ready for delivery,completed
-email notification for booking a service into owners side

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Vishnuk1030/bike_service_app_laravel10

   
2.Navigate to the project directory:

cd bike_service_app

3.Install dependencies using Composer:

composer install

4.Copy the .env.example file to .env and update the database configuration:

cp .env.example .env

Update the database credentials in the .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

Update the mail credentials for email message in the .env file:

MAIL_MAILER=smtp
MAIL_HOST=your_host
MAIL_PORT=your_port_number
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=from@example.com
MAIL_FROM_NAME="${APP_NAME}"

5.Generate application key:

php artisan key:generate

6.Migrate the database:

php artisan migrate

7.Seed the database (optional):

php artisan db:seed

8.Serve the application:

php artisan serve

You can now access the application at http://localhost:8000.

**1.service station Owner side**

**Login credentials**
email id:owner@gmail.com
password:123456

**2.Customer side**

**Login credentials**
email id:vishnu@gmail.com
password:123456




   


