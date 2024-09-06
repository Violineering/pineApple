CREATE DATABASE IF NOT EXISTS pineappleusers CHARACTER SET utf8 COLLATE utf8_general_ci;

USE pineappleusers;

CREATE TABLE IF NOT EXISTS users (
    pineapple_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phoneNo VARCHAR(255) NOT NULL,
    birthday VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);