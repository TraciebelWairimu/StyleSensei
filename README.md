# Style Sensei
# A Digital Wardrobe Web Application

## Description

This is a web application that allows users to manage their wardrobe digitally. Users can organize their clothing items, create outfits, and track their fashion choices.

## Prerequisites

Before deploying the digital wardrobe web application, ensure that the following software is installed on your PC:

- PHP (version 7.4 or higher)
- Composer
- Laravel Framework (version 8.x)
- Node.js (version 14.x or higher)
- NPM (Node Package Manager)

## Usage

### Installing

1. Clone the repository

```
git clone https://github.com/your-username/stylesensei.git
```
2. Navigate to project directory 

```
cd stylesensei
```

3. Install PHP dependencies

```
composer install
```
4. Install JavaScript dependencies

```
npm install
```
5. Create a copy of the ``.env.example`` file and rename it to `.env`

```
cp .env.example .env
```
6. Generate an application key:

```
php artisan key:generate

```
7. Configure the database
- Open the `.env` file and update the database connection details, including the database name, username, and password.
- Create a new database on your MySQL server with the specified name.

8. Migrate the database 

```
php artisan migrate
```

9. Compile the assets:

```
npm run dev
```

10. Start the development server

```
php artisan serve
```

11. Open a web browser and access the application at `http://localhost:8000`

##### Congratulations! You have successfully deployed Style Sensei Web Application on your PC.




