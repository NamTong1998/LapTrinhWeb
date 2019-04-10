<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel 5.7

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Viettesol WepApp
## Pre-require

Install XAMPP PHP 7.2
```bash
https://www.apachefriends.org/download.html
```

Install Composer
```bash
https://getcomposer.org/download/
```

## Installation

Clone Project into htdos Folder (Clone Project vào thư mục htdocs)
```bash
git clone https://github.com/NamTong1998/LapTrinhWeb.git
```

Cd Project (Truy cập Root Folder của Project)
```bash
cd LapTrinhWeb
```
Some files are ignored to be cloned due to .gitignore contents. In order for this project to be runnable, do:
(Một số file bị bỏ qua trong quá trình clone do nội dung quy định trong file .gitignore. Để project hoạt động được, thực hiện các bước sau:)

Install php composer package (Cài gói php composer, sẽ tạo thư mục vendor)
```bash
composer install
```
Copy file .env (copy file .env bị thiếu)
```bash
cp .env.example .env
```
Generate the project key (Tạo key project)
```bash
php artisan key:generate
```
Update the database if there are any new .sql files in database Folder (Cập nhật cơ sở dữ liệu nếu có từ file .sql mới trong thư mục database)
```bash
Hmmm
```
Initialize the virtual host (Tạo host ảo chạy thử)
```bash
php artisan serve
```

Go to (Truy cập)
```bash
localhost:8000
```
