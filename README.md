## Prerequisites

Ensure you have the following installed:

- PHP (>= 8.0)
- Apache Server
- Composer
- Node.js and npm (or Yarn) for frontend assets
- MySQL or another database server

## Installation

Follow these steps to set up the project locally:

### Summary of Steps:
- **Prerequisites**: Node.js (or Yarn), Composer, PHP, Apache & MySQL (or another SQL-compatible database).
- **Installation**: Install PHP packages with Composer & Node.js packages with npm or Yarn.
- **Setup**: Configure environment variables, set up the database, run migrations & seeders.
- **Running**: Build frontend assets & serve the application.

1. **Clone the Repository**

   ```bash
   git clone https://github.com/SiyabongaCyril/CRM-System.git
   ```
   Then,
   ```bash
   cd CRM-system
   ```

3. **Install Dependencies**

   Install the PHP dependencies:
   ```bash
   composer install
   ```
   Then, install Node.js dependencies:
   ```bash
   npm install
   ```
   OR, if you're using Yarn:
   ```bash
   yarn install
   ```
   
4. **Set Up Environment File**

   Copy the .env.example file to .env:
   ```bash
   cp .env.example .env
   ```
   Then update the .env file with your database and other environment configurations.

5. **Generate New Application Key**

   ```bash
   php artisan key:generate
   ```

6. **Run Migrations**

   Run the migrations to set up the database schema:
   ```bash
   php artisan migrate
   ```

8. **Seed the database**
   
   Seed the database with initial administrator(s):
   ```bash
   php artisan db:seed
   ```

10. **Build Frontend Assets**

   This application uses a frontend stack - Blade with Alpine, you'll need to build the frontend assets:
   ```bash
   npm run dev
   ```
   OR, if you,re using Yarn
   ```bash
    yarn dev
  ```
   OR, in a production environment
   ```bash
   npm run build
   ```
   OR,
   ```bash
   yard build
   ``` 

11. **Serve the Application**

   ```bash
   php artisan serve
   ```
