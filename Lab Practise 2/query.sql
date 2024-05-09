-- Create the database
CREATE DATABASE registration_php_task_db;

-- Use the database
USE registration_php_task_db;

-- Create the users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
