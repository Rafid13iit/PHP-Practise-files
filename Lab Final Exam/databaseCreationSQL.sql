CREATE DATABASE contact_form_db;

CREATE TABLE users (
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    sub VARCHAR(255) NOT NULL,
    message TEXT
);