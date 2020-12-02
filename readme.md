## Description

CRUD application for the code assesment for Caag.

## Instructions

In order to make the automatic email work uppon creating and updating of a student record. Make sure to add your email address in the .env file.  
TEMP_EMAIL={your email}

If you want to use a temporary email address you can use: https://temp-mail.org/

In order for the POST request to work you need to pass in 2 required form fields  
name -> minimal length of 2 Characters  
age -> must be a number

In order for the PUT request to work you need to pass in 2 required form fields  
name -> minimal length of 2 Characters  
age -> must be a number  


## CRUD Endpoints

GET /students/{studentId}  
POST /students  
PUT /students/{studentId}  
DELETE /students/{studentId}

## Commands

To run tests enter: vendor/bin/phpunit
To run the hourly email command enter: php artisan schedule:run  
To run the server on local host enter: php artisan serve (make sure to have installed composer and the vendor files)