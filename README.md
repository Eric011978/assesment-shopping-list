# Shopping List Tool

This is a simple PHP MVC application that allows you to manage a shopping list.

## Features
- Add items
- Delete items
- Edit items
- Mark items as checked

## Requirements
- PHP 7.4 or higher with the PDO MySQL extension
- A MySQL server

## Setup
1. Copy `.env.example` to `.env` and adjust the database credentials (host,
   name, user, password, charset).
2. Create a MySQL database matching the `DB_NAME` in your `.env` file.
3. Run migrations:
   ```bash
   php migrate.php
   ```
   This will create the `items` table in the configured MySQL database.
4. Start the PHP development server:
   ```bash
   php -S localhost:8000
   ```
   Visit `http://localhost:8000` in your browser.

## Database Schema
The `migrations/001_create_items_table.sql` file contains the DDL:
```sql
CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    checked TINYINT(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

No seed data is required. The application starts with an empty list.
