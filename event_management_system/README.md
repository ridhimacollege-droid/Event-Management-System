# Event Management System

## Project Title
Event Management System using PHP and MySQL

## Group Members
Ridhima Kaneriya
Raj Paldiya
Ishaani Singh Chandel
Lakshya Peera


## Project Description

The **EventPro - Event Management System** is a web-based application developed to manage event registrations efficiently.  
It allows users to create accounts, explore available events, register for events, and manage their registrations.  

An admin panel is provided to manage events, monitor participants, and maintain the event database.

This project was developed as part of the **BCA 2nd Year academic curriculum** and demonstrates practical implementation of web development concepts using **PHP** and **MySQL**.


## Objectives of the Project

- To develop a real-world web application using PHP and MySQL
- To manage event registrations digitally
- To provide separate interfaces for users and admin
- To maintain event and participant data efficiently
- To implement CRUD operations in a database-driven system


## User Features

- User Registration
- User Login and Logout
- View Available Events
- Register for Events
- View My Registrations
- Responsive Navigation Bar
- Contact Section


## Admin Features

- Admin Login
- Add New Events
- View All Participants
- Manage Event Data
- Monitor Event Registrations


## Technologies Used

### Frontend
- HTML
- CSS
- JavaScript

### Backend
- PHP

### Database
- MySQL

### Server
- XAMPP (Apache + MySQL)

### Version Control
- GitHub


## Database Tables
The system uses the following tables:

### 1. users

| Field | Type |
|------|-----|
| user_id | INT (Primary Key) |
| name | VARCHAR |
| email | VARCHAR |
| password | VARCHAR |
| phone | VARCHAR |


### 2. events

| Field | Type |
|------|-----|
| event_id | INT (Primary Key) |
| event_name | VARCHAR |
| event_date | DATE |
| venue | VARCHAR |
| price | DECIMAL |
| seat_limit | INT |
| description | TEXT |


### 3. registrations

| Field | Type |
|------|-----|
| registration_id | INT (Primary Key) |
| user_id | INT (Foreign Key) |
| event_id | INT (Foreign Key) |
| registration_date | DATE |


### 4. admin

| Field | Type |
|------|-----|
| admin_id | INT (Primary Key) |
| email | VARCHAR |
| password | VARCHAR |


## Project Folder Structure

event_management_system
│
├── admin
│ admin_login.php
│ dashboard.php
│ view_participants.php
| add_event.php
| edit_event.php
│
├── user
│ login.php
| index.php
│ register.php
│ events.php
│ my_registrations.php
│ register_event.php
| logout.php
| images
│
├── assets
| style.css
|
├── config
│ db.php
│
├── includes
│ navbar.php
│
└── README.md


## How to Run the Project
Follow these steps to run the project on your system:

### Step 1 — Install XAMPP
Download and install:
https://www.apachefriends.org


### Step 2 — Move Project Folder
Place the project inside:
C:\xampp\htdocs


### Step 3 — Start Server
Open XAMPP Control Panel and start:
- Apache
- MySQL


### Step 4 — Create Database
Open:
http://localhost/phpmyadmin⁠

Create database:
event_db


### Step 5 — Import Database
Import the SQL file provided with the project.


### Step 6 — Run Project
Open browser and go to:
http://localhost/event_management_system⁠/user/index.php


## Admin Login Credentials
Email: admin@gmail.com 
Password: admin123


## Future Enhancements

- Online Payment Integration
- Email Notifications
- Event Image Upload
- User Profile Management
- Report Generation
- Mobile Responsive Design


## Academic Information

**Course:** Bachelor of Computer Applications (BCA)  
**Year:** 2nd Year  
**Project Type:** Web Development Project Using PHP and MySQL + Database Management System 
**Submission:** Final Internal & External Viva  


## Acknowledgement
We would like to express our sincere gratitude to our faculty members - Ms. Trapti Kulkarni for their guidance and support in completing this project successfully.


## License
This project is developed for academic purposes only.