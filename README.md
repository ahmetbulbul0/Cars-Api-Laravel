# Cars-Api

**_Cars Api Project_**

## Technologies

-   **Php**
-   **Laravel**

## Project Setup Process

### Install composer (for php packages)

```sh
composer install
```

### Create .env file

```sh
1. duplicate the ".env.example" in main folder
2. rename the file you copied to ".env"
3. configure the ".env" file you renamed
```

### Create app key

```sh
php artisan key:generate
```

### Run migrations (for create database tables)

```sh
php artisan migrate
```

### Run Seeders (for datas)

```sh
php artisan db:seed
```

### Run project

```sh
php artisan serve
```

## Api Documentation (/api)

> **Car Types** (/car-types)
>
> -   _Listing_
>     -   Method = _GET_
>     -   Route = _/_
> -   _Show_
>     -   Method = _GET_
>     -   Route = _/{carTypeId}_
> -   _Create_
>     -   Method = _POST_
>     -   Route = _/_
>     -   Data =
>     -   -   name = _required & string & unique:car_types,name_
> -   _Update_
>     -   Method = _PATCH_
>     -   Route = _/{carTypeId}_
>     -   Data =
>     -   -   name = _required & string & unique:car_types,name_
> -   _Delete_
>     -   Method = _DELETE_
>     -   Route = _/{carTypeId}_

> **Car Brands** (/car-brands)
>
> -   _Listing_
>     -   Method = _GET_
>     -   Route = _/_
> -   _Show_
>     -   Method = _GET_
>     -   Route = _/{carBrandId}_
> -   _Create_
>     -   Method = _POST_
>     -   Route = _/_
>     -   Data =
>     -   -   name = _required & string & unique:car_brands,name_
> -   _Update_
>     -   Method = _PATCH_
>     -   Route = _/{carBrandId}_
>     -   Data =
>     -   -   name = _required & string & unique:car_brands,name_
> -   _Delete_
>     -   Method = _DELETE_
>     -   Route = _/{carBrandId}_

> **Cars** (/cars)
>
> -   _Listing_
>     -   Method = _GET_
>     -   Route = _/_
> -   _Show_
>     -   Method = _GET_
>     -   Route = _/{carId}_
> -   _Create_
>     -   Method = _POST_
>     -   Route = _/_
>     -   Data =
>     -   -   name = _required & string & unique:cars,name_
>     -   -   type = _required & integer & exists:car_types,id_
>     -   -   brand = _required & integer & exists:car_brands,id_
> -   _Update_
>     -   Method = _PATCH_
>     -   Route = _/{carId}_
>     -   Data =
>     -   -   name = _required & string & unique:cars,name_
>     -   -   type = _required & integer & exists:car_types,id_
>     -   -   brand = _required & integer & exists:car_brands,id_
> -   _Delete_
>     -   Method = _DELETE_
>     -   Route = _/{carId}_
