<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 🛍️ Buy Finite - Fashion Store (E-Commerce Website)

**Buy Finite** is a modern fashion eCommerce website built using **Laravel**. It features a complete user and admin experience with secure authentication, Google OAuth, coupon system, and seamless communication between users and the admin dashboard.

---

## 🔥 Features

- 🛒 User & Admin Roles
- 🔐 User Authentication (Login, Registration)
- 🔑 OAuth via Google
- 🔁 Forgot Password with Mail Reset
- 🎟️ Coupon Code Functionality
- 🛠️ Admin Dashboard
- 📞 Contact Admin System
- 🎨 Tailwind CSS Styling
- 📦 Blade Templating
- 💬 Flash Messages for User Feedback

---

## 🧰 Tech Stack

| Tech | Usage |
|------|-------|
| **Laravel** | PHP backend framework |
| **Blade** | Templating engine |
| **MySQLi** | Relational database |
| **Tailwind CSS** | Utility-first CSS framework |
| **OAuth (Google)** | Social login integration |
| **Laravel Mail** | Password reset & notifications |

---

## 🚀 Getting Started

### Prerequisites
- PHP >= 8.2
- Composer >= 2.8
- Node.js & NPM
- MySQL/MariaDB
- Laravel CLI

### Installation
composer create-project laravel/laravel ecom #buy finite name added after create.
php artisna make:controller controllers
php artisan make:migration create_table_name_table
php artisan migrate
composer require laravel/socialite

### Run
composer run dev (This run boths vite + laravel)
--
php artisan serve (This on for Laravel)
