# Laravel Service Booking System

A simple API-based service booking system built with Laravel, allowing customers to register, view services, and make bookings while providing admin functionality to manage services and view all bookings.

## Customer Features

- User registration and authentication
- Browse available services
- Book services for future dates
- View personal booking history

## Admin Features

- Admin authentication
- Create, update, and delete services
- View all customer bookings
- Manage service availability

## Technical Features

- RESTful API design
- Token-based authentication using Laravel Sanctum
- Form Request validation
- API Resource classes for clean responses
- Database seeders for initial data
- Comprehensive API documentation

## Requirements

- PHP version 8.2.12
- Composer version 2.8.9
- Laravel Framework 12.21.0

# Installation

## 1. Clone the Repository
- git clone[https://github.com/Wrong1234/Service-Booking-System].git
- cd Service-Booking-System

## 2. Install Dependencies
- composer install

## 3. Environment Setup
- cp .env.example .env
- php artisan key:generate

## 4. Configure Database

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=service-booking-system
- DB_USERNAME=root
- DB_PASSWORD=""

## 5. Run Migrations and Seeders

- php artisan migrate
- php artisan db:seed

## 6. Install Laravel Sanctum
- composer require laravel/sanctum
- php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

## Install Swagger Api
- composer require darkaonline/l5-swagger
- php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
- php artisan l5-swagger:generate

# Database Schema
## Users Table
- id (Primary Key)
- name
- email
- password
- role
- email_verified_at
- timestamps

## Services Table

- id (Primary Key)
- name
- description
- price (decimal)
- status (enum: active, inactive)
- timestamps

## Bookings Table

- id (Primary Key)
- user_id (Foreign Key to users)
- service_id (Foreign Key to services)
- booking_date
- status (enum: pending, confirmed, cancelled, completed)
- timestamps

# API Endpoints

## Basic api end points
- POST /api/register
- POST /api/login

## Customer End points
- GET /api/services -> (Get Available Services)
- POST /api/bookings -> (Create Booking)
- GET /api/bookings -> (Get User Bookings)

## Admin End points
- POST /api/services -> (Create Service)
- PUT /api/services/{id} -> (Update Service)
- DELETE /api/services/{id} -> (Delete Service)
- GET /api/admin/bookings -> (Get All Bookings)


