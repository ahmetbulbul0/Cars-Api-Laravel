# Cars-Api-Laravel

A robust API built with Laravel to manage car-related data. This project provides endpoints to perform full CRUD (Create, Read, Update, Delete) operations for cars, car brands, and car types, making it an ideal backend solution for applications that require vehicle-related information management.

Key Features:
- CRUD Operations:
    - Manage cars, car brands, and car types seamlessly.
    - Fully functional endpoints for adding, retrieving, updating, and deleting records.
- Laravel Framework:
    - Built with Laravel, ensuring a secure and scalable API architecture.
- RESTful Design:
    - Follows RESTful principles for easy integration with frontend applications.
- Clean and Organized Code:
    - Designed for maintainability and scalability, making it easy to extend and adapt.
This project serves as a solid foundation for applications needing vehicle data, such as car dealership platforms, rental services, or automotive directories.

## Technologies (languages & frameworks)

- Php
- Laravel

## Setup

1. Install Php Packages
```sh
composer install
```
2. Create .env File
```sh
1. duplicate the ".env.example" in main folder
2. rename the file you copied to ".env"
3. configure the ".env" file you renamed
```
3. Create App Key
```sh
php artisan key:generate
```
4. Run Migrations
```sh
php artisan migrate
```
5. Run Seeders (For Test Datas)
```sh
php artisan db:seed
```
6. Run Laravel Project
```sh
php artisan serve
```

## Endpoints

- Cars [localhost:8000/api/cars](http://localhost:8000/api/cars) Method: GET
- Car Create [localhost:8000/api/cars](http://localhost:8000/api/cars) Method: POST
- Car Show [localhost:8000/api/cars/:id](http://localhost:8000/api/cars/:id) Method: GET
- Car Update [localhost:8000/api/cars/:id](http://localhost:8000/api/cars/:id) Method: PATCH
- Car Delete [localhost:8000/api/cars/:id](http://localhost:8000/api/cars/:id) Method: DELETE
- Car Brands [localhost:8000/api/car-brands](http://localhost:8000/api/car-brands) Method: GET
- Car Brand Create [localhost:8000/api/car-brands](http://localhost:8000/api/car-brands) Method: POST
- Car Brand Show [localhost:8000/api/car-brands/:id](http://localhost:8000/api/car-brands/:id) Method: GET
- Car Brand Update [localhost:8000/api/car-brands/:id](http://localhost:8000/api/car-brands/:id) Method: PATCH
- Car Brand Delete [localhost:8000/api/car-brands/:id](http://localhost:8000/api/car-brands/:id) Method: DELETE
- Car Types [localhost:8000/api/car-types](http://localhost:8000/api/car-types) Method: GET
- Car Type Create [localhost:8000/api/car-types](http://localhost:8000/api/car-types) Method: POST
- Car Type Show [localhost:8000/api/car-types/:id](http://localhost:8000/api/car-types/:id) Method: GET
- Car Type Update [localhost:8000/api/car-types/:id](http://localhost:8000/api/car-types/:id) Method: PATCH
- Car Type Delete [localhost:8000/api/car-types/:id](http://localhost:8000/api/car-types/:id) Method: DELETE
- Car Features [localhost:8000/api/car-features](http://localhost:8000/api/car-features) Method: GET
