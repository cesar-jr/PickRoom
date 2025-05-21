# 🗳️ PickRoom

**PickRoom** is a clean and playful platform where anyone can create, share, and vote on polls.  
Built with ❤️ using Laravel, it was designed to be user-friendly, lightweight, and visually engaging — with full support for light and dark mode.

---

## ✨ Features

-   🔐 Login with Google, Twitter and GitHub (OAuth)
-   🧠 Custom poll creation
-   ✅ Vote anonymously with instant visual feedback
-   🌗 Light and dark theme support
-   📱 Responsive and mobile-friendly UI
-   🗃 View and manage your created polls

---

## 🚀 Getting Started

### Requirements

-   PHP 8.2+
-   Composer
-   Node.js & npm
-   A database (PostgreSQL)

### Installation

```bash
git clone https://github.com/cesar-jr/PickRoom.git
cd PickRoom

# Install backend dependencies
composer install

# Install frontend dependencies
npm install && npm run dev

# Copy and edit environment variables
cp .env.example .env
php artisan key:generate

# Configure your DB in .env and run migrations
php artisan migrate

# Start the local server
php artisan serve
```

---

## 🔑 Social Login (OAuth)

This project uses [Laravel Socialite](https://laravel.com/docs/socialite) to support login via:

-   Google
-   Twitter
-   GitHub

> Be sure to configure your credentials in the `.env` file:

```env
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=

X_CLIENT_ID=
X_CLIENT_SECRET=

GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=
```

---

## 📁 Project Structure

-   `app/Http/Controllers/Auth/AuthenticatedSessionController.php` – Handles OAuth redirects and callbacks
-   `resources/views/` – Blade views with light/dark support
-   `routes/web.php` – Main routes for the app
-   `public/` – Frontend assets and entry point

---

## 💡 About the Project

This app was built to explore and learn the **Laravel** framework while applying modern web development practices such as:

-   OAuth authentication
-   Blade templating with TailwindCSS
-   User-centered design
-   Building clean and scalable interfaces

---

## 📸 Sample Polls

-   _What’s the best potato form? 🍟_
-   _How many alarms do you set to wake up? ⏰_
-   _Pineapple on pizza: yes or no? 🍍_

---

## ✍️ Author

Made by [Cesar Jr](https://github.com/cesar-jr)  
Like it? Go create your own poll on **PickRoom**! 😄
