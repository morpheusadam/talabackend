# NeoVel

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Database Diagram](#database-diagram)

## Introduction
Welcome to NeoVel! This project is designed to provide a comprehensive platform with features such as user management, post management, and more.

## Features
- User Management
- Post Management
- Category Management
- Role and Permission Management
- Media Management
- Dashboard and Reports

## Installation
To get started with NeoVel, follow these steps:

1. **Clone the repository:**
    ```bash
    git clone https://github.com/morpheusadam/neovel.git
    cd neovel
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3. **Set up environment variables:**
    Copy the `.env.example` file to `.env` and update the necessary environment variables.
    ```bash
    cp .env.example .env
    ```

4. **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5. **Run migrations:**
    ```bash
    php artisan migrate:fresh --seed
    php artisan module:migrate-refresh --seed Auth
    php artisan module:migrate-refresh --seed Mag
    ```

    

6. **Copy necessary files:**
    ```bash
    cp -r doc/install/filemanager/fa vendor/tomatophp/filament-media-manager/resources/lang/
    cp doc/install/expection/ExceptionResource.php vendor/bezhansalleh/filament-exceptions/src/Resources/ExceptionResource.php
    cp -r doc/install/expection/fa /var/www/neovel.local/vendor/bezhansalleh/filament-exceptions/resources/lang
    ```

7. **Create a new module:**
    ```bash
    php artisan module:make Test
    php artisan module:make-migration create_test_table Test
    php artisan module:migrate-refresh --seed Test
    ```

8. **Manage module migrations:**
    Edit `modules_statuses.json` to enable or disable your own migrations.

9. **Start the development server:**
    ```bash
    php artisan serve
    ```

## Usage
Once the installation is complete, access the application at `http://localhost:8000`.

### Admin Panel
Navigate to `http://localhost:8000/admin` and log in with the admin credentials:
- **Username:** admin
- **Password:** admin

### Translations
This project supports multiple languages. Translation files are located in the `lang` directory.

## Contributing
We welcome contributions! To contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add some feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Open a pull request.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.

for read modules how to work
/home/morpheus/Applications/devilbox/data/www/talarin/doc/cheatsheet/module.md

## Database Diagram
![Database Diagram](https://dbdiagram.io/d/66d220d2eef7e08f0e44da9d)
