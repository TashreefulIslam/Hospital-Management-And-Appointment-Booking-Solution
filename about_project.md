# 🏥 Hospital Management & Appointment System

A modern, responsive, and user-friendly web-based **Hospital Management & Appointment Solution** built with **Laravel, Blade, Tailwind CSS, JavaScript, and MySQL**.

The system combines a professional hospital website with an appointment management platform, allowing visitors to explore hospital services and doctors, registered users to request appointments, and administrators to manage doctors, users, and appointment requests through a dedicated dashboard.

> **Project Status:** In Development 🚧

---

## 📌 Overview

The **Hospital Management & Appointment Solution** is designed as a lightweight and practical healthcare management solution for hospitals, clinics, and healthcare organizations.

The platform provides two main application roles:

* 👤 **User / Patient**
* 🛡️ **Administrator**

Visitors can browse the hospital's public website, learn about available services, and view active doctors. Registered users can create accounts, request appointments, track appointment status, and manage their personal information.

Administrators have access to a dedicated dashboard where they can manage doctors, registered users, user roles, and appointment requests.

The project is intentionally designed with a focused scope. A dedicated **Doctor role and Doctor Dashboard** may be introduced in a future version.

---

## ✨ Key Features

### 🌐 Public Hospital Website

* Professional and responsive homepage
* Hospital logo and branding
* Hero section with call-to-action
* About Us section
* Hospital services section
* Active doctors section
* Patient testimonials
* Contact information
* Professional footer
* Responsive navigation
* Mobile-friendly design

### 👤 User / Patient Features

* User registration
* Secure login and logout
* Automatic `user` role assignment during registration
* User dashboard
* Personalized welcome message
* View active doctors
* View doctor profiles and availability
* Submit appointment requests
* Appointment status tracking
* Appointment history
* Edit personal profile
* Change password
* Secure account management

### 🛡️ Admin Features

* Secure admin login
* Admin dashboard
* Dashboard statistics
* Quick access actions
* Doctor management
* Create new doctor profiles
* Edit doctor details
* Delete doctors
* Activate/deactivate doctors
* Manage doctor availability
* View registered users
* Delete users
* Update user roles
* View all appointments
* Approve appointment requests
* Decline appointment requests
* Edit admin profile
* Change password

### 📅 Appointment Management

* Doctor selection
* Appointment date selection
* Appointment time selection
* Patient information
* Reason for visit
* Additional message
* Automatic `pending` status on submission
* Admin approval or decline
* Real-time status visibility for users
* Appointment history

### 🔐 Security

* Laravel authentication
* Secure password hashing
* CSRF protection
* Server-side form validation
* Role-based access control
* Admin route protection
* Unique email validation
* Unique phone validation
* Current password verification
* Protected authenticated routes

---

# 🧑‍💻 User Roles

The system currently supports two roles.

## 👤 User / Patient

A registered user can:

```text
Register
   ↓
Login
   ↓
User Dashboard
   ├── View Dashboard
   ├── Check Doctors
   ├── Request Appointment
   ├── View Appointment History
   ├── Edit Profile
   └── Logout
```

---

## 🛡️ Administrator

The administrator can:

```text
Login
   ↓
Admin Dashboard
   ├── Dashboard
   ├── Manage Doctors
   ├── Manage Users
   ├── Manage Appointments
   ├── Edit Profile
   └── Logout
```

---

# 🔄 Appointment Workflow

The main appointment workflow is:

```text
Visitor
   ↓
Browse Doctors
   ↓
Register / Login
   ↓
Select Doctor
   ↓
Submit Appointment Request
   ↓
Appointment Status = Pending
   ↓
Admin Reviews Request
   ↓
     ┌───────────────┐
     │               │
     ▼               ▼
  Approved        Declined
     │               │
     └───────┬───────┘
             ▼
     User Views Updated Status
```

### Appointment Statuses

| Status     | Description                                                |
| ---------- | ---------------------------------------------------------- |
| `pending`  | Appointment request is waiting for admin review            |
| `approved` | Appointment has been approved by the administrator         |
| `declined` | Appointment request has been declined by the administrator |

---

# 🏗️ System Architecture

The project follows a Laravel-based MVC architecture.

```text
┌──────────────────────────────────────┐
│              User Browser            │
└──────────────────┬───────────────────┘
                   │
                   ▼
┌──────────────────────────────────────┐
│     Laravel Blade + Tailwind CSS     │
│          + Vanilla JavaScript        │
└──────────────────┬───────────────────┘
                   │
                   ▼
┌──────────────────────────────────────┐
│          Laravel Application         │
│                                      │
│  Authentication                      │
│  Role-Based Authorization            │
│  User Management                     │
│  Doctor Management                   │
│  Appointment Management              │
└──────────────────┬───────────────────┘
                   │
                   ▼
┌──────────────────────────────────────┐
│              MySQL Database          │
└──────────────────────────────────────┘
```

---

# 🛠️ Technology Stack

## Backend

* **Laravel**
* **PHP**
* **MySQL**

## Frontend

* **Laravel Blade**
* **HTML5**
* **Tailwind CSS**
* **Vanilla JavaScript**

## Development Environment

* **XAMPP**
* **phpMyAdmin**
* **Visual Studio Code**

## Version Control

* **Git**
* **GitHub**

---

# 🗄️ Database Structure

The initial version uses three primary database tables.

## `users`

Stores both normal users/patients and administrators.

| Column       | Description                |
| ------------ | -------------------------- |
| `id`         | Unique user identifier     |
| `name`       | User's full name           |
| `email`      | Unique email address       |
| `phone`      | Unique phone number        |
| `address`    | User address               |
| `password`   | Hashed password            |
| `role`       | `user` or `admin`          |
| `created_at` | Account creation timestamp |
| `updated_at` | Last update timestamp      |

---

## `doctors`

Stores doctor information managed by administrators.

| Column         | Description                       |
| -------------- | --------------------------------- |
| `id`           | Unique doctor identifier          |
| `image_url`    | Public doctor image URL           |
| `name`         | Doctor's full name                |
| `designation`  | Doctor's professional designation |
| `short_bio`    | Short biography                   |
| `x_url`        | X/Twitter profile URL             |
| `facebook_url` | Facebook profile URL              |
| `linkedin_url` | LinkedIn profile URL              |
| `status`       | `active` or `inactive`            |
| `availability` | Doctor's available schedule       |
| `created_at`   | Creation timestamp                |
| `updated_at`   | Last update timestamp             |

---

## `appointments`

Stores appointment requests submitted by users.

| Column             | Description                          |
| ------------------ | ------------------------------------ |
| `id`               | Unique appointment identifier        |
| `user_id`          | Related user                         |
| `doctor_id`        | Related doctor                       |
| `appointment_date` | Requested appointment date           |
| `appointment_time` | Requested appointment time           |
| `patient_name`     | Patient name                         |
| `patient_phone`    | Patient phone                        |
| `patient_email`    | Patient email                        |
| `patient_address`  | Patient address                      |
| `reason`           | Reason for appointment               |
| `message`          | Additional message                   |
| `status`           | `pending`, `approved`, or `declined` |
| `created_at`       | Creation timestamp                   |
| `updated_at`       | Last update timestamp                |

---

# 🔗 Database Relationships

```text
User
 │
 │ 1
 │
 │ hasMany
 │
 ▼
Appointments
 │
 │ belongsTo
 │
 │ Many-to-One
 │
 ▼
Doctor
```

### Laravel Eloquent Relationships

```php
User hasMany Appointments

Doctor hasMany Appointments

Appointment belongsTo User

Appointment belongsTo Doctor
```

---

# 📁 Project Structure

The project follows a standard Laravel application structure.

```text
hospital-management-system/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   │
│   └── Models/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   └── assets/
│
├── resources/
│   └── views/
│       ├── layouts/
│       ├── components/
│       │
│       ├── public/
│       │   ├── home.blade.php
│       │   ├── about.blade.php
│       │   ├── services.blade.php
│       │   ├── doctors.blade.php
│       │   └── contact.blade.php
│       │
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       │
│       ├── user/
│       │   ├── dashboard.blade.php
│       │   ├── doctors.blade.php
│       │   ├── appointments/
│       │   └── profile.blade.php
│       │
│       └── admin/
│           ├── dashboard.blade.php
│           ├── doctors/
│           ├── users/
│           ├── appointments/
│           └── profile.blade.php
│
├── routes/
│   └── web.php
│
├── .env
├── artisan
├── composer.json
└── README.md
```

> The exact structure may evolve during development as the application grows.

---

# 🚀 Installation & Setup

Follow the steps below to run the project locally.

## 1. Clone the Repository

```bash
git clone https://github.com/TashreefulIslam/Hospital-Management-And-Appointment-Booking-Solution
```

Navigate to the project directory:

```bash
cd Hospital-Management-And-Appointment-Booking-Solution
```

---

## 2. Install PHP Dependencies

Run:

```bash
composer install
```

---

## 3. Create Environment File

Copy the example environment file:

```bash
cp .env.example .env
```

On Windows, you can manually copy `.env.example` and rename the copy to:

```text
.env
```

---

## 4. Generate Application Key

Run:

```bash
php artisan key:generate
```

---

## 5. Configure MySQL Database

Start the following services from XAMPP:

* Apache
* MySQL

Open phpMyAdmin and create a database.

For example:

```text
hospital_management_db
```

Then configure your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hospital_management_db
DB_USERNAME=root
DB_PASSWORD=
```

Adjust the database username and password according to your local MySQL configuration.

---

## 6. Run Database Migrations

Run:

```bash
php artisan migrate
```

If seeders are available, run:

```bash
php artisan db:seed
```

Or:

```bash
php artisan migrate --seed
```

---

## 7. Start the Laravel Development Server

Run:

```bash
php artisan serve
```

Open the application in your browser:

```text
http://127.0.0.1:8000
```

---

# 👑 Creating an Admin Account

New users are automatically registered with:

```text
role = user
```

The admin role is not available during public registration.

For the initial project setup, the first administrator can be created by updating the `role` column in the database using phpMyAdmin.

Example:

```sql
UPDATE users
SET role = 'admin'
WHERE email = 'admin@example.com';
```

After changing the role, the user can log in and access the Admin Dashboard.

> For a production system, consider implementing a secure admin creation or invitation process instead of manually modifying roles in phpMyAdmin.

---

# 📱 Responsive Design

The system is designed to work across:

* 🖥️ Desktop
* 💻 Laptop
* 📱 Mobile
* 📟 Tablet

The public website, user dashboard, and admin dashboard should all provide responsive layouts.

---

# 🎨 UI/UX Design Goals

The project focuses strongly on creating a professional first impression.

The interface aims to provide:

* Clean visual hierarchy
* Modern healthcare aesthetics
* Consistent typography
* Professional color palette
* Responsive layouts
* Intuitive navigation
* Clear call-to-action buttons
* Accessible forms
* Meaningful status indicators
* Professional dashboards
* User-friendly error and success messages

The goal is to make the application feel like a real-world hospital platform rather than a basic academic CRUD application.

---

# 🔮 Future Improvements

The initial version intentionally focuses on a limited scope.

Future versions may include:

### 👨‍⚕️ Doctor Module

* Doctor login
* Doctor dashboard
* Doctor appointment management
* Doctor availability management
* View assigned patients

### 📅 Advanced Appointment System

* Automatic time-slot generation
* Prevent double booking
* Appointment cancellation
* Appointment rescheduling
* Doctor-specific availability

### 🩺 Medical Management

* Patient medical records
* Medical history
* Prescriptions
* Diagnosis
* Doctor notes

### 🔔 Notifications

* In-app notifications
* Email notifications
* SMS notifications

### 💳 Additional Hospital Features

* Online payments
* Billing management
* Pharmacy management
* Laboratory management
* Prescription management
* Insurance management

### 📝 Content Management

Future versions may allow administrators to manage:

* Homepage content
* About Us content
* Services
* Testimonials
* Hospital contact information
* Announcements and notices

---

# 🧪 Testing

The application should be tested for:

* User registration
* User login/logout
* Admin authentication
* Role-based access
* Doctor CRUD operations
* User management
* Appointment submission
* Appointment status updates
* Profile updates
* Password changes
* Form validation
* Responsive layouts
* Unauthorized route access

---

# 🔐 Security Considerations

The application uses Laravel's built-in security features and follows standard security practices.

Important security considerations include:

* Password hashing
* CSRF protection
* Authentication
* Authorization
* Role-based middleware
* Server-side validation
* Protected routes
* Unique email validation
* Unique phone validation

Never expose sensitive credentials or environment variables.

The `.env` file should never be committed to GitHub.

---

# 📌 Project Scope

### Current Version

```text
Public Website
       │
       ├── Home
       ├── About
       ├── Services
       ├── Doctors
       └── Contact
       
User / Patient
       │
       ├── Registration
       ├── Login
       ├── Dashboard
       ├── Doctor List
       ├── Appointment Request
       ├── Appointment History
       └── Profile Management

Admin
       │
       ├── Dashboard
       ├── Doctor Management
       ├── User Management
       ├── Appointment Management
       └── Profile Management
```

---

# 📊 Project Status

| Module                    | Status            |
| ------------------------- | ----------------- |
| Public Website            | 🚧 In Development |
| Authentication            | 🚧 In Development |
| User Dashboard            | 🚧 In Development |
| Admin Dashboard           | 🚧 In Development |
| Doctor Management         | 🚧 In Development |
| User Management           | 🚧 In Development |
| Appointment Management    | 🚧 In Development |
| Doctor Role               | 🔮 Planned        |
| Advanced Medical Features | 🔮 Planned        |

---

# 🤝 Contributing

Contributions, suggestions, and improvements are welcome.

To contribute:

1. Fork the repository.
2. Create a new branch.

```bash
git checkout -b feature/new-feature
```

3. Make your changes.
4. Commit your changes.

```bash
git commit -m "Add new feature"
```

5. Push the branch.

```bash
git push origin feature/new-feature
```

6. Open a Pull Request.

---

# 📄 License

This project is developed for educational, training, and demonstration purposes.

If this system is customized and deployed for a real hospital or healthcare organization, appropriate licensing, privacy, security, and legal requirements should be considered.

---

# 👨‍💻 Author

**Tashreeful Islam**

Computer Science & Engineering Student

GitHub: `TashreefulIslam`

---

# ⭐ Acknowledgement

This project was developed as part of an **Industrial Training / Academic Software Development Project**, with the goal of applying practical full-stack web development concepts to a real-world healthcare management scenario.

---

## 🏥 Final Note

The **Hospital Management & Appointment Solution** is designed to provide a strong foundation for a scalable healthcare platform.

The current version focuses on the essential workflow:

> **Discover Hospital → Explore Doctors → Register → Login → Request Appointment → Admin Review → Approve/Decline → Track Appointment**

The architecture is intentionally kept modular so that advanced features such as **Doctor Dashboards, Medical Records, Prescriptions, Notifications, Billing, and other healthcare services** can be introduced in future releases.
