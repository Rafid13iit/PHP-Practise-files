CREATE DATABASE registration_php_task_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userid VARCHAR(12) NOT NULL,
    passid VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    country VARCHAR(50) NOT NULL,
    zip VARCHAR(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    sex ENUM('Male', 'Female') NOT NULL,
    languages VARCHAR(100),
    description TEXT
);
