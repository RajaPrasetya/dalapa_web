# Dalapa Web

A web application built with Laravel framework.

## Requirements

- PHP >= 8.0
- Composer
- MySQL or PostgreSQL
- Node.js & NPM

## Installation

1. Clone the repository
    ```bash
    git clone <repository-url>
    cd dalapa_web
    ```

2. Install PHP dependencies
    ```bash
    composer install
    ```

3. Install NPM dependencies
    ```bash
    npm install
    ```

4. Create a copy of your .env file
    ```bash
    cp .env.example .env
    ```

5. Generate an app encryption key
    ```bash
    php artisan key:generate
    ```

6. Create an empty database for the application

7. Configure your database in the .env file
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=dalapa_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```

8. Migrate the database
    ```bash
    php artisan migrate
    ```

9. Seed the database (optional)
    ```bash
    php artisan db:seed
    ```

## Running the Application

Start the development server:

```bash
php artisan serve
```

You can now access the application at http://localhost:8000

## Testing

Run the tests with:

```bash
php artisan test
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).