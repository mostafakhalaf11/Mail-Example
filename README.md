<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Mail Example

This project demonstrates sending welcome emails to users after registration, login, or via an Artisan command using Laravel Breeze, Events, Listeners, and Mailables.

## Features

- **User Registration & Login**: Powered by [Laravel Breeze](https://laravel.com/docs/starter-kits#breeze).
- **Automatic Welcome Email**: Sends a personalized welcome email after user registration or login.
- **Event-Driven Architecture**: Uses custom events and listeners for email sending.
- **Command-Line Trigger**: Fire the welcome email manually to any user via an Artisan command.
- **Mailtrap Integration**: Out-of-the-box support for [Mailtrap](https://mailtrap.io/) for safe email testing.

---

## Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/mostafakhalaf11/mail-example.git
cd laravel-mail-example
```

### 2. Install Dependencies

```bash
composer install
npm install
npm run dev
```

### 3. Environment Setup

- Copy `.env.example` to `.env` and update your settings.
- Set your database credentials.
- Set your Mailtrap credentials (see `.env`):

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your@email.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Start the Development Server

```bash
php artisan serve
```

---

## Usage

### Register or Login

- Register a new user or log in with an existing user.
- After registration or login, a welcome email will be sent to the user's email address.
<img width="1257" height="778" alt="image" src="https://github.com/user-attachments/assets/80a4b0da-a234-4c49-9335-1ba441927632" />
<img width="1250" height="782" alt="image" src="https://github.com/user-attachments/assets/88f80016-d1c8-4573-8653-12d783fb0618" />


### Fire Email from Command Line

- You can manually trigger the welcome email for any user by their ID:

```bash
php artisan fire:articleEmail {user_id}
```
Example:
```bash
php artisan fire:articleEmail 1
```

---
<img width="1231" height="808" alt="image" src="https://github.com/user-attachments/assets/ebaef096-7bca-464d-9e26-83bac1f6b863" />

- If no ID is passed, the command will use the first user in the database. If the specified user ID is not found, it will return "User not found":
  
<img width="1125" height="422" alt="image" src="https://github.com/user-attachments/assets/5132a196-aca9-4e92-97b7-a078e42f6182" />


---

## How It Works

- **Events & Listeners**:  
  - `ArticleEmailEvent` is fired after registration or login.
  - `SendArticleEmail` listener sends the email using the `ArticleEmail` Mailable.
- **Blade Email Template**:  
  - Located at `resources/views/emails/article.blade.php`.
  - Displays a personalized greeting and message.

---

## Customization

- Edit the email template in `resources/views/emails/article.blade.php` to change the email content or design.
- Update event firing logic in:
  - `App\Http\Controllers\Auth\RegisteredUserController`
  - `App\Http\Controllers\Auth\AuthenticatedSessionController`

---

## Troubleshooting

- **Mail not sending?**
  - Check your Mailtrap credentials in `.env`.
  - Make sure your queue is running if you use queued emails.
- **Database errors?**
  - Ensure you have run all migrations and your DB credentials are correct.

---

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
