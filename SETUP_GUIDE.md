# Notifications API - Setup Guide

This guide will help you set up the Notifications API project on your local development environment.

## Prerequisites

-   PHP 8.2 or higher
-   Composer (latest version)
-   Node.js (v18+ recommended)
-   MySQL/PostgreSQL/SQLite (MySQL recommended)
-   Git
-   XAMPP/WAMP (Windows) or MAMP (Mac) for local development (optional but recommended)

## Setup Instructions

### 1. Clone the Repository

```bash
git clone <repository-url>
cd notifications-api
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install NPM Dependencies

```bash
npm install
```

### 4. Environment Configuration

1. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

2. Generate application key:

    ```bash
    php artisan key:generate
    ```

3. Configure your environment variables in the `.env` file. At minimum, update:

    ```env
    APP_NAME=NotificationsAPI
    APP_ENV=local
    APP_DEBUG=true
    APP_URL=http://localhost:8000

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=notifications_db
    DB_USERNAME=root
    DB_PASSWORD=

    # For Twilio (if using)
    TWILIO_SID=your_twilio_sid
    TWILIO_AUTH_TOKEN=your_twilio_auth_token
    TWILIO_FROM=your_twilio_phone_number

    # For Vonage (if using)
    VONAGE_KEY=your_vonage_key
    VONAGE_SECRET=your_vonage_secret
    VONAGE_FROM=your_vonage_phone_number
    ```

### 5. Database Setup

1. Create a new MySQL database named `notifications_db` (or your preferred name)
2. Run migrations and seeders:
    ```bash
    php artisan migrate --seed
    ```

### 6. Storage Link

Create a symbolic link for file storage:

```bash
php artisan storage:link
```

### 7. Start the Development Server

#### Option 1: Using Laravel's built-in server

```bash
php artisan serve
```

The application will be available at: http://127.0.0.1:8000

#### Option 2: Using Laravel Sail (Docker)

If you prefer using Docker:

```bash
./vendor/bin/sail up -d
```

### 8. Queue Worker (For asynchronous jobs)

If your application uses queues, start the queue worker:

```bash
php artisan queue:work
```

## Development Tools

-   **Debugging**: Laravel Debugbar is included. Access it in the bottom right corner of your application when in debug mode.
-   **Testing**: Run tests with:
    ```bash
    php artisan test
    ```
-   **Code Style**: Enforce code style with:
    ```bash
    composer lint
    ```

## API Documentation

API documentation is available at `/api/documentation` after setting up the project.

## Common Issues

1. **Permission Issues**: If you encounter permission issues, run:

    ```bash
    chmod -R 775 storage/
    chmod -R 775 bootstrap/cache/
    ```

2. **Composer Memory Limit**: If you get memory limit errors:
    ```bash
    COMPOSER_MEMORY_LIMIT=-1 composer update
    ```

## Support

If you encounter any issues during setup, please contact the development team or create an issue in the repository.

---

Happy Coding! 🚀
