# Smart College Automation System

A complete full-stack web application for college management.

## Features

- **Role-Based Access Control**: Admin, Faculty, and Student panels.
- **Secure Authentication**: PHP Sessions and secure routing.
- **Modern UI**: Clean design with Bootstrap 5, FontAwesome, and a dark/light mode toggle.
- **Analytics Dashboard**: Interactive charts using Chart.js.
- **Core Modules**: Attendance, Marks, Notices, Timetable, and Fees management interfaces.

## Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Backend**: PHP 8+
- **Database**: MySQL (PDO)
- **Server**: Apache (via XAMPP)

## Setup Instructions for Localhost (XAMPP)

1. **Install XAMPP**: Ensure you have XAMPP installed on your machine.
2. **Copy Files**: Move the entire `mini` folder (or whatever you named the root folder) into your XAMPP `htdocs` directory.
   - On Windows: `C:\xampp\htdocs\mini`
   - On Mac: `/Applications/XAMPP/xamppfiles/htdocs/mini`
3. **Start Servers**: Open XAMPP Control Panel and start the **Apache** and **MySQL** modules.
4. **Setup Database**:
   - Open your browser and go to `http://localhost/phpmyadmin`
   - Create a new database named `mini`.
   - Select the `mini` database, click on the **Import** tab.
   - Choose the `database.sql` file provided in the root directory and click **Go**.
5. **Configuration**:
   - The default configuration in `config/database.php` assumes `root` user with no password. If your local setup differs, please update these credentials.
6. **Access Application**:
   - Open your browser and go to `http://localhost/mini` (or whatever the folder name is).

## Default Login Credentials

**Admin:**
- Username: `admin`
- Password: `admin123`

*(You can create faculty and student logins from the Admin panel's User Management section once implemented fully, or insert them directly into the database).*

## Project Structure

```
mini/
├── admin/          # Admin panel pages
├── assets/         # CSS, JS, and Images
├── config/         # Database configuration
├── faculty/        # Faculty panel pages
├── includes/       # Reusable UI components & Auth logic
├── student/        # Student panel pages
├── index.php       # Landing Page
├── login.php       # Unified Login Page
├── logout.php      # Logout Logic
└── database.sql    # Database schema and seed data
```
