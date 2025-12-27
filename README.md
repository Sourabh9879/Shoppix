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
<img width="1920" height="1080" alt="Screenshot (92)" src="https://github.com/user-attachments/assets/e5497954-6286-4580-9079-4b5c60034979" />

<img width="1500" height="844" alt="image" src="https://github.com/user-attachments/assets/37ce37fc-86b9-40a8-9e6d-b67ac74502e0" />
<img width="1500" height="844" alt="image" src="https://github.com/user-attachments/assets/6d966cc9-db2d-475a-8373-deb3dba08fba" />
<img width="1500" height="844" alt="image" src="https://github.com/user-attachments/assets/24314086-26f8-40a9-9c47-aa3a22abba29" />
<img width="1500" height="844" alt="image" src="https://github.com/user-attachments/assets/1017fe39-9cf7-41f3-8787-362451ef7153" />
<img width="1500" height="844" alt="image" src="https://github.com/user-attachments/assets/8d5073ce-eea2-46cf-80b6-48c8dea0c874" />
<img width="1920" height="1080" alt="Screenshot (100)" src="https://github.com/user-attachments/assets/7cf58dee-1761-48d8-aa5c-cecf95534a05" />

<img width="1500" height="844" alt="image" src="https://github.com/user-attachments/assets/f73bd20c-4d24-471d-b447-541e91cca9d8" />
<img width="1500" height="844" alt="image" src="https://github.com/user-attachments/assets/c8848035-4a46-43d6-8ab7-9b1a2103ead5" />
<img width="1500" height="844" alt="image" src="https://github.com/user-attachments/assets/400b93f6-d712-4b0f-9d8f-ab4e9b96413b" />
<img width="1920" height="1080" alt="Screenshot (104)" src="https://github.com/user-attachments/assets/07a543c3-6e50-4fbf-ac1d-12d4f8923458" />
<img width="1920" height="1080" alt="Screenshot (105)" src="https://github.com/user-attachments/assets/10a3eb23-d408-4eb2-a42b-fa3b4ba598fd" />
<img width="1920" height="1080" alt="Screenshot (106)" src="https://github.com/user-attachments/assets/49d3594a-4958-4495-b98e-f24d17cca8ba" />
<img width="1920" height="1080" alt="Screenshot (107)" src="https://github.com/user-attachments/assets/d6fc5189-d0c2-482b-87b0-4873d0b8aafc" />


<img width="1500" height="844" alt="image" src="https://github.com/user-attachments/assets/4bbcfb38-9c1f-42db-8341-88140ed22700" />
<img width="1500" height="844" alt="image" src="https://github.com/user-attachments/assets/581397d1-ced5-4c8c-8ef2-8163dbb86a38" />







