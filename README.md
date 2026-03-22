# DishDiary - Phase 3

DishDiary is a recipe web application built for the ICT 2204 / COM 2303 mini project. This Phase 3 version extends the Phase 2 frontend by adding PHP, MySQL, authentication, a contact form, recipe storage, and a user dashboard.

## Features
- User registration with hashed passwords
- User login and logout with PHP sessions
- Contact form with database storage
- Add Recipe form connected to MySQL
- Recipe list, category filtering, and single recipe view
- User dashboard showing personal recipes and site counts
- Reused DishDiary logo, team images, and recipe images from Phase 2

## Folder Structure
- `css/` - stylesheets
- `js/` - JavaScript
- `images/` - logo, team, and recipe images
- `includes/` - database and helper files
- `auth/` - register, login, logout files
- `uploads/` - user uploaded recipe images
- `database.sql` - database export for submission

## How to Run with XAMPP
1. Install XAMPP.
2. Start **Apache** and **MySQL**.
3. Copy this project folder into `htdocs`.
4. Open `phpMyAdmin`.
5. Create a database named `dishdiary` or simply import `database.sql`.
6. Import the `database.sql` file.
7. Open your browser and go to:
   - `http://localhost/DishDiary_Phase3/`

## Default Database Settings
The project uses these settings in `includes/db.php`:
- Host: `localhost`
- Username: `root`
- Password: `` (empty)
- Database: `dishdiary`

If your local setup is different, edit `includes/db.php`.

## Important Notes
- Registration creates new users in the database.
- Add Recipe requires login.
- Contact messages are stored in the `messages` table.
- Uploaded images are stored in the `uploads/` folder.

## Submission Checklist
- Push all project files to GitHub
- Include `database.sql`
- Include this `README.md`
- Submit the public GitHub link in the LMS

## Authors
- Senal Dilanka - ICT/2023/023   Index_No - 6015
- Imalka Ashen - ICT/2023/097    Index_No - 6078
