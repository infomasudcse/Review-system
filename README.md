
## ReviewBoost – SaaS Review Management Platform

ReviewBoost is a professional SaaS solution built to help businesses automate and manage their online reputation. It streamlines the process of collecting, monitoring, and showcasing customer feedback through a centralized dashboard.

# Tech Stack

Backend: PHP 8.1 & Laravel 10

Frontend: Blade with Bootstrap

Database: MySQL

Libraray: Stripe, Brevo, Breeze, Tinker, Cashier, laravel-honeypot

Tooling: Composer, NPM, Git (Feature-branch workflow)

# Key Features

Automated Review Invitations: Logic-driven scheduling to request feedback from customers at the optimal time.

Centralized Dashboard: A unified view for managing reviews across multiple platforms using custom API integrations.

Dynamic Scheduling: Sophisticated backend logic for handling business hours and custom scheduling constraints.

RESTful API Architecture: Built with a clean, decoupled structure for scalability and third-party synchronization.


# Installation & Setup

- Clone the repository:
	git clone https://github.com/infomasudcse/ReviewBoost.git

- Install Dependencies:
	composer install
 	npm install && npm run build

- Environment Configuration:
	Copy .env.example to .env.
	Configure your DB_DATABASE and API credentials.

- Run
	php artisan key:generate

- Database Setup:
	php artisan migrate --seed