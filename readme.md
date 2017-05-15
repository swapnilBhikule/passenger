
> A small laravel project build to store passwords online.

# Framework/Libraries Used
- Laravel 5.4
- Skeleton CSS 2.0.4
- Bootstrap Modal Component from v3.3.7
- jQuery

## Requirements
- PHP 7.0+
- MySQL 5+

## Installation
- Clone the repository
  ```bash
   git clone https://github.com/swapnilBhikule/passenger.git
  ```
- Create .env using .env.example and populate the relevant information
- Install the dependencies
  ```bash
   composer install
  ```
- Open the project directory and run the below
  ```bash
   php artisan migrate
  ```
- Generate an application key
  ```bash
   php artisan key:generate
  ```
- Steps
- [X] Sign Up to the application
  - [x] Any email address is fine since there is not email verification added
- [x] Create new password vault details by filling appropriate inputs.
- [x] Form validation for saving contact details is on both sides (JS and Laravel Validation)

# How It Works?
- Your master password(the password you use to login to the system) is stored in hashed format in the database.
- It is irreversible. 
- Passenger use the same password during login process to create encryption/decryption key.
- This dynamically generated key gets used to encrypt/decrypt your all other passwords.
- This gives you the additional security of dynamic encryption which is difficult to hack since all users got their
own encryption key.

## License

This application is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
