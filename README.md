# How can we use this repo?


# Install
```sh
composer install
```
Next you can clone the `.env.example` file into the `.env` file. This means that you have to create the same file in the `root` directory under a different name e.g. `.env` and place the credentials associated with your server in this file.

Laravel has a built-in CLI tool called `artisan`. Your application must generate a unique base 64 key that Laravel uses behind the scenes to bootstrap this project.

**Command:**

```sh
php artisan key:generate
```

It will automatically find your `.env` file and place the base 64 value in the file.

**Output inside the file:**
```
APP_KEY=base64:T0huMR5Wx9EoDmjTxniKTofHD/7cOiDeVVD9eTKuCa0=
```

# Database
In my case I am using  **Postgres** and inside `.env` file my database server creditenials are:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1  
DB_PORT=5432
DB_DATABASE=shop_test
DB_USERNAME=postgres
DB_PASSWORD=a
```

However, your main server and database server get started.

# Template I am using
[Download Link](https://startbootstrap.com/template/shop-homepage)
