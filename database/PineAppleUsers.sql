-- Create Database
CREATE DATABASE IF NOT EXISTS pineappleusers CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Select the database
USE pineappleusers;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    pineapple_id VARCHAR(50) PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phoneNo VARCHAR(255) NOT NULL,
    birthday VARCHAR(255) NOT NULL,
    profilepic LONGBLOB,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create orders_in_cart table
CREATE TABLE IF NOT EXISTS orders_in_cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pineapple_id VARCHAR(255),
    product_name VARCHAR(255) NOT NULL,
    storage VARCHAR(255),
    color VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL
);

-- Create orders_confirmed table
CREATE TABLE IF NOT EXISTS orders_confirmed (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pineapple_id VARCHAR(255),
    product_name VARCHAR(255) NOT NULL,
    storage VARCHAR(255),
    color VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    order_list_id INT NOT NULL, -- Added to group items in the same order
    FOREIGN KEY (pineapple_id) REFERENCES users(pineapple_id)
);

-- Create payment_details table
CREATE TABLE IF NOT EXISTS payment_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_list_id INT NOT NULL,
    -- Personal information
    email VARCHAR(100) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    region VARCHAR(100) NOT NULL,
    phoneNo VARCHAR(255) NOT NULL,
    zip VARCHAR(255) NOT NULL,
    -- Payment information
    name_on_card VARCHAR(255) NOT NULL,
    credit_card_number VARCHAR(20) NOT NULL,
    exp_month VARCHAR(20) NOT NULL,
    exp_year INT(4) NOT NULL,
    cvv INT(3) NOT NULL,
    -- Pricing information
    subtotal DECIMAL(10, 2) NOT NULL,
    shipping DECIMAL(10, 2) NOT NULL,
    sales_tax DECIMAL(10, 2) NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_list_id) REFERENCES orders_confirmed(order_list_id) 
);

-- Create contact_us table
CREATE TABLE IF NOT EXISTS contact_us (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phoneNo VARCHAR(255) NOT NULL,
    comments TEXT NOT NULL
);
