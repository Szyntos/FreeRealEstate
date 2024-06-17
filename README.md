# FreeRealEstate

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Configuration](#configuration)
- [Running the Application](#running-the-application)
- [Seeding the Database](#seeding-the-database)
- [Routes](#routes)
- [License](#license)

## Introduction

FreeRealEstate is a web application for managing and viewing real estate properties. It includes features for users, administrators, and guest users, providing different levels of access and functionality. It was done for fun as an introduction to PHP.

## Features

- **Guest Users:**
  - View properties without seeing the price.
- **Authenticated Users:**
  - View property details including prices.
  - Add properties to favorites.
  - Update personal profile and change password.
  - Submit contact forms to get in touch with consultants.
- **Administrators:**
  - Manage properties (add, edit, delete).
  - View and manage user-submitted contact forms.
  - Manage registered users (view, delete non-admin users).

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/not-free-realestate.git
   cd not-free-realestate
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Copy the `.env` file:**
   ```bash
   cp .env.example .env
   ```

4. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

## Configuration

1. **Update the `.env` file:**
   Configure your database and other settings in the `.env` file.
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

2. **Configure the mail settings if necessary:**
   ```env
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.mailtrap.io
   MAIL_PORT=2525
   MAIL_USERNAME=null
   MAIL_PASSWORD=null
   MAIL_ENCRYPTION=null
   MAIL_FROM_ADDRESS="hello@example.com"
   MAIL_FROM_NAME="${APP_NAME}"
   ```

## Running the Application

1. **Run the migrations:**
   ```bash
   php artisan migrate
   ```

2. **Start the development server:**
   ```bash
   php artisan serve
   ```

3. **Compile the assets:**
   ```bash
   npm run dev
   ```

## Seeding the Database

1. **Run the database seeders:**
   ```bash
   php artisan db:seed
   ```

   This will create an admin user and several properties for testing purposes.

## Routes

- **Home Page:** `/`
- **Login:** `/login`
- **Register:** `/register`
- **Profile:** `/profile`
- **Contact Form:** `/contact_forms/create`
- **Admin Dashboard:** `/admin`
- **Manage Properties (Admin):** `/admin/properties`
- **Manage Users (Admin):** `/admin/users`
- **View Contact Forms (Admin):** `/admin/contact_forms`

## License

This project is open-source and available under the [MIT License](LICENSE).
