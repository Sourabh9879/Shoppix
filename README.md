# Shoppix - Buy And Sell Platform

Shoppix is a modern platform that enables users to buy and sell products. Built with Laravel, it provides a secure and user-friendly marketplace experience.

## Features

### User Authentication
- Traditional email/password login
- Google OAuth integration
- User registration with validation
- Secure session management

### User Dashboard
- Overview of user activities
- Quick access to key features
- Recent products display
- Statistics (My Products, Wishlist items, Total Products)

### Product Management
- Add new products with images
- Edit existing products
- Delete products
- Product categorization
- Product search functionality
- Detailed product views

### Shopping Features
- Add products to wishlist
- Make offers on products
- View product details
- Contact sellers
- Product image preview

### User Profile
- Profile information management
- Profile picture upload
- Contact information update
- Address management

### Admin Panel
- User management
  - View all users
  - Freeze/Unfreeze users
  - Delete users
- Product oversight
  - View all products
  - Remove inappropriate products
- Dashboard with statistics
  - Total users
  - Active users
  - Total products
  - Recent activities

### Security Features
- User account status monitoring
- Report inappropriate content/users
- Input validation
- Secure file uploads
- Protected routes

## Technical Stack

### Frontend
- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- Google Material Icons

### Backend
- PHP 8.3
- Laravel Framework
- MySQL Database
- Google OAuth API

### Key Components
- MVC Architecture
- Middleware Authentication
- File Storage System
- Session Management
- Database Migrations

## Installation

1. Clone the repository
```bash
git clone https://github.com/yourusername/shoppix.git
```

2. Install dependencies
```bash
composer install
npm install
```

3. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Set up database
```bash
php artisan migrate
```

5. Link storage
```bash
php artisan storage:link
```

6. Start the server
```bash
php artisan serve
```

## Environment Requirements
- PHP >= 8.0
- MySQL >= 5.7
- Composer
- Laravel Requirements

## Contributing
Contributions are welcome! Please feel free to submit a Pull Request.

## Google Auth
```php

in .env File Add this for Google Auth 

GOOGLE_CLIENT_ID
GOOGLE_CLIENT_SECRET
GOOGLE_REDIRECT_URI

```

## Email Configuration
```php

MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_ENCRYPTION=
MAIL_USERNAME=your_gmail
MAIL_PASSWORD="use App password instead of password"
MAIL_FROM_NAME="project_name"
MAIL_FROM_ADDRESS=your_gmail

```
