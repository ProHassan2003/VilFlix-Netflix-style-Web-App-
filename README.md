# VilFlix-Netflix-style-Web-App-


VilFlix is a Netflix-inspired full-stack web application that allows users to browse movies, watch trailers, and manage a personal watchlist.

This project was built to practice frontend development, backend authentication, database integration, and project structure organization.

Demo

Local development:

http://localhost/vilflix


(Live demo can be added later.)

Features

User authentication (Register / Login / Logout)

Movie browsing interface

Trailer viewing page

Watchlist system (Add / Remove)

Session-based access control

Database-connected backend

Netflix-style UI layout

Tech Stack
Frontend

HTML5

CSS3

JavaScript

Backend

PHP

MySQL

Development Tools

VS Code

MAMP / XAMPP

phpMyAdmin

Git & GitHub

Project Structure
vilflix
│
├── assets/
├── auth/
├── includes/
│   ├── config.php
│   ├── db.php
│   └── auth.php
│
├── index.php
├── browse.php
├── watchlist.php
├── trailer.php
├── style.css
└── README.md

Database Setup

Create database:

vilflix


Tables required:

users

movies

watchlist

Update database credentials in:

includes/config.php


Example:

$host = "localhost";
$db   = "vilflix";
$user = "root";
$pass = "root";

Installation

Clone the repository:

git clone https://github.com/YOUR_USERNAME/vilflix.git


Move project to:

htdocs/


Start:

Apache

MySQL

Then open:

http://localhost/vilflix

What I Learned

While building VilFlix, I practiced:

Structuring a PHP project

Connecting PHP with MySQL using PDO

Session-based authentication

CRUD operations

Organizing frontend and backend code

Building a real web application from scratch

Future Improvements

Admin panel for movie management

Movie search feature

Responsive mobile design

REST API integration

Password hashing improvements

Deployment to hosting server

Author

Hassan Jehangir
Programming & Internet Technologies Student
Vilnius Business College
