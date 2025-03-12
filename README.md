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

## Routes Documentation

### Authentication Routes
```php
GET    /                  # Show login page
POST   /LoginUser        # Authenticate user login
GET    /signup           # Show registration page
POST   /RegisterUser     # Register new user
GET    /LogoutUser       # Logout user and clear session
GET    /auth/google      # Redirect to Google OAuth
GET    /auth/google/callback # Handle Google OAuth callback
POST   /change-password  # Change user password
GET    /forget-password  # Show forget password page
GET    /password-form    # Show password reset form
POST   /password-validation # Validate password reset
POST   /ForgetPassword   # Handle forget password request
GET    /otp-verification # Show OTP verification form
POST   /verify-otp       # Verify OTP
```

### User Routes
```php
GET    /userdash         # User dashboard with statistics and recent products
GET    /products         # Display all available products
GET    /add-product      # Show add product form
POST   /store-product    # Save new product to database
GET    /my-products      # Show user's listed products
GET    /profile/{id}     # Show user profile
PUT    /profile/{id}     # Update user profile information
GET    /cart             # Show user's wishlist items
PUT    /update-product/{id}    # Update product details
DELETE /delete-product/{id}    # Remove product listing
POST   /add-to-cart/{id}      # Add product to wishlist
DELETE /remove-from-cart/{id}  # Remove product from wishlist
POST   /report-user/{id}      # Report a user for inappropriate behavior
```

### Product Routes
```php
GET    /product/{id}     # Show detailed product view
GET    /search           # Search products by name or description
```

### Offer Routes
```php
POST   /store-offer      # Store new offer for a product
GET    /offer           # Show offers made by current user
GET    /message         # Show received offers for seller
GET    /accept/{id}     # Accept an offer
GET    /reject/{id}     # Reject an offer
GET    /deleteoffer/{id} # Delete an offer
```

### Admin Routes
```php
GET    /admdash         # Admin dashboard with statistics
GET    /admprofile/{id} # Admin profile view
PUT    /admprofile/{id} # Update admin profile
GET    /admin-products  # View all products in system
DELETE /deleteProduct/{id}    # Remove product from system
GET    /users           # View all users
DELETE /deleteUser/{id}       # Remove user from system
GET    /FreezeUser/{id}      # Disable user account
GET    /UnfreezeUser/{id}    # Enable user account
```

### Google OAuth Routes
```php
GET    /auth/google          # Redirect to Google OAuth
GET    /auth/google/callback # Handle Google OAuth callback
```

All routes except login and signup are protected by authentication middleware to ensure secure access.