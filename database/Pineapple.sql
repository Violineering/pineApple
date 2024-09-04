CREATE DATABASE IF NOT EXISTS Pineapple CHARACTER SET utf8 COLLATE utf8_general_ci;

USE Pineapple;

CREATE TABLE IF NOT EXISTS PineBook (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    description VARCHAR(255),
    core VARCHAR(255),
    display VARCHAR(255),
    camera VARCHAR(255),
    ports VARCHAR(255),
    features VARCHAR(255),
    storage VARCHAR(255),
    color VARCHAR(255),
    price DECIMAL(6,2)
);

INSERT INTO PineBook (name, description, core, display, camera, ports, features, storage, color, price) VALUES
('PineBook Light', 'Designed for light duty', '16-core Juicy Engine (8 CPU, 8 GPU)', '13.6 inch Liquid Retina', '1080p HD Camera', 'Two Flashspeed ports, Two USB ports', 
'<ul><li>Support for two external display</li><li>35W USB-C Power Adapter</li><li>Fly mode enabled (negates 99.99% of fall damage)</li></ul>',
'512 GB, 1 TB', 'Blue, Purple, Green, Yellow', 1499),
('PineBook King', 'Designed for heavy duty', '32-core Juicy Engine (16 CPU, 16 GPU)', '16 inch Liquid Retina PDR', '4K Ultra HD Camera', 'Three Flashspeed ports, Four USB ports', 
'<ul><li>Support for 4 external display</li><li>150W USB-C Power Adapter</li><li>Built from lightweight & durable Vibranium metal (negates 99.99% of physical damage)</li></ul>',
'512 GB, 1 TB', 'Black, Silver', 2499);



CREATE TABLE IF NOT EXISTS book_image_path (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL
);

INSERT INTO book_image_path (name, image_path) VALUES
('PineBook King', '../image/PineBook/PineBook King - 1.png'),
('PineBook King', '../image/PineBook/PineBook King - 2.png'),
('PineBook Light', '../image/PineBook/PineBook Light - 1.png'),
('PineBook Light', '../image/PineBook/PineBook Light - 2.png'),
('PineBook Light', '../image/PineBook/PineBook Light - 3.png'),
('PineBook Light', '../image/PineBook/PineBook Light - 4.png');

CREATE TABLE IF NOT EXISTS PinePhone (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    description VARCHAR(255),
    core VARCHAR(255),
    chipset VARCHAR(255),
    RAM VARCHAR(10),
    display VARCHAR(255),
    camera VARCHAR(255),
    battery VARCHAR(255),
    features VARCHAR(255),
    storage VARCHAR(255),
    color VARCHAR(255),
    price DECIMAL(6,2)
);

INSERT INTO PinePhone (name, description, core, chipset, RAM, display, camera, battery, features, storage, color, price) VALUES
('PinePhone Pro Ultimate', 'Built for high performance', 'Hexa-core', 'Pineapple P20 Pro', '8 GB', '6.7 inch PINE Super Retina XDR OLED, 120Hz', '4K Ultra HD Camera', 'Li-Ion 5000 mAh, non-removable battery', 
'<ul><li>The world''s first phone built with Adamantium metal.</li><li>Quantum levitation technology (defies gravity for an unparalleled experience)</li><li>Endless battery life with solar charging glass</li><li>Ultra-secure biometric encryption</li></ul>', 
'256GB, 512GB, 1TB', 'Black, White, Natural, Blue', 999),
('PinePhone Pro Gamer', 'Optimized for gamers', 'Hexa-core', 'Pineapple P20', '8 GB', '6.7 inch PINE Super Retina OLED, 120Hz', '1080p HD Camera', 'Li-Ion 4700 mAh, non-removable battery',
'<ul><li>Adaptive gaming controls with customizable screen buttons</li><li>Integrated game controllers</li><li>Hyper-cooling system for extended gaming sessions</li></ul>', 
'256GB, 512GB, 1TB', 'Black, White, Red, Blue, Purple, Yellow', 799),
('PinePhone Primitive', 'Affordable and reliable', 'Octa-core', 'Pineapple P19 Pro', '6 GB', '6.7 inch PINE Retina OLED, 60Hz', '1080p HD Camera', 'Li-Ion 4700 mAh, non-removable battery',
'<ul><li>Durable polycarbonate body for everyday use</li><li>All-day battery life</li><li>Fast charging with USB-C port</li></ul>', 
'256GB, 512GB, 1TB', 'Red, White, Black, Blue, Starlight, Green', 699),
('PinePhone Cutie', 'Designed for womans', 'Heca-core', 'Pineapple P19', '6 GB', '6.1 inch PINE Retina OLED, 60Hz', '4K Ultra HD Camera', 'Li-Ion 4000 mAh, non-removable battery',
'<ul><li>Compact and lightweight design</li><li>Customizable shell colors with floral patterns</li><li>Enhanced selfie camera with beauty mode</li></ul>', 
'256GB, 512GB, 1TB', 'Black, White, Green, Yellow, Pink', 599),
('PinePhone OG', 'This is where all it started', 'Dual-core', 'Pineapple P15', '4 GB', '5.4 inch PINE Retina IPS LCD, 30Hz', '720p Camera', 'Li-Ion 2700 mAh, non-removable battery',
'<ul><li>Classic design with a 30-pin dock connector</li><li>Virtual keyboard and PiOS integration</li></ul>', 
'64GB, 128GB, 256GB', 'Red, Black, White', 299);

CREATE TABLE IF NOT EXISTS phone_image_path (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL
);

INSERT INTO phone_image_path (name, image_path) VALUES
('PinePhone Cutie', '../image/PinePhone/PinePhone Cutie - 1.png'),
('PinePhone Cutie', '../image/PinePhone/PinePhone Cutie - 2.png'),
('PinePhone Cutie', '../image/PinePhone/PinePhone Cutie - 3.png'),
('PinePhone Cutie', '../image/PinePhone/PinePhone Cutie - 4.png'),
('PinePhone OG','../image/PinePhone/PinePhone OG - 1.png'),
('PinePhone OG','../image/PinePhone/PinePhone OG - 2.png'),
('PinePhone OG','../image/PinePhone/PinePhone OG - 3.png'),
('PinePhone OG','../image/PinePhone/PinePhone OG - 4.png'),
('PinePhone Primitive', '../image/PinePhone/PinePhone Primitive - 1.png'),
('PinePhone Primitive', '../image/PinePhone/PinePhone Primitive - 2.png'),
('PinePhone Primitive', '../image/PinePhone/PinePhone Primitive - 3.png'),
('PinePhone Primitive', '../image/PinePhone/PinePhone Primitive - 4.png'),
('PinePhone Pro Gamer', '../image/PinePhone/PinePhone Pro Gamer - 1.png'),
('PinePhone Pro Gamer', '../image/PinePhone/PinePhone Pro Gamer - 2.png'),
('PinePhone Pro Gamer', '../image/PinePhone/PinePhone Pro Gamer - 3.png'),
('PinePhone Pro Gamer', '../image/PinePhone/PinePhone Pro Gamer - 4.png'),
('PinePhone Pro Ultimate', '../image/PinePhone/PinePhone Pro Ultimate - 1.png'),
('PinePhone Pro Ultimate', '../image/PinePhone/PinePhone Pro Ultimate - 2.png'),
('PinePhone Pro Ultimate', '../image/PinePhone/PinePhone Pro Ultimate - 3.png'),
('PinePhone Pro Ultimate', '../image/PinePhone/PinePhone Pro Ultimate - 4.png');

CREATE TABLE IF NOT EXISTS PinePad (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    description VARCHAR(255),
    core VARCHAR(255),
    chipset VARCHAR(255),
    RAM VARCHAR(10),
    display VARCHAR(255),
    camera VARCHAR(255),
    battery VARCHAR(255),
    features VARCHAR(255),
    storage VARCHAR(255),
    color VARCHAR(255),
    price DECIMAL(6,2)
);

INSERT INTO PinePad (name, description, core, chipset, RAM, display, camera, battery, features, storage, color, price) VALUES
('PinePad Gamer', 'Optimized for gamers', '10 core', 'PINE P4', '16 GB', '11.0 inches Pine Ultra Retina Tandem OLED, 120Hz', '720p Camera', 'Li-Po 9290 mAh, non-removable battery', 
'<ul><li>Hyper Liquid Cooling System</li><li>Adaptive AI Gaming Assist</li><li>Support fast wireless recharging (1 hour to full charge)</li></ul>',
'256 GB, 512 GB, 1 TB', 'Mint, Peach, White, Grey', 1299),
('PinePad OG', 'This is where all it started...', 'Dual-core', 'P16', '4 GB', ' 9.0 IPS LCD capacitive touchscreen', '480p Camera', 'Li-Po 7080 mAh, non-removable battery', 
'<ul><li>The world''s first tablet to be created</li><li>Experiences PINE OS, the first-ever tablet app ecosystem</li></ul>',
'32 GB, 64 GB', 'White, Yellow, Red, Blue', 699),
('PinePad Pro', 'Bulit for high performance', '8 core', 'PINE P4', '16 GB', '13.0 inches Pine Ultra Retina Tandem OLED, 120Hz', '1080p HD Camera', 'Li-Po 10290 mAh, non-removable battery', 
'<ul><li>The world''s thinest tablet ever</li><li>Magnetic float display (float slightly above surfaces)</li><li>Built from lightweight & durable Vibranium metal (negates 99.99% of physical damage)</li></ul>', 
'256 GB, 512 GB, 1 TB', 'Black, White', 999),
('PinePad Smol', 'Pocket-sized, easily portable', '6 core', 'PINE P3', '8 GB', '8.3 inches Pine Ultra Retina Tandem OLED, 120Hz', '720p Camera', 'Li-Po 6069 mAh, non-removable battery', 
'<ul><li>Featherlight design (weighing less than 200 grams)</li><li>Optimized interface for smaller screen, easier navigation</li></ul>',
'128 GB, 256 GB, 512 GB', 'Grey, White, Peach, Blue', 899);

CREATE TABLE IF NOT EXISTS pad_image_path (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL
);

INSERT INTO pad_image_path (name, image_path) VALUES
('PinePad Gamer', '../image/PinePad/PinePad Gamer - 1.png'),
('PinePad Gamer', '../image/PinePad/PinePad Gamer - 2.png'),
('PinePad Gamer', '../image/PinePad/PinePad Gamer - 3.png'),
('PinePad Gamer', '../image/PinePad/PinePad Gamer - 4.png'),
('PinePad OG', '../image/PinePad/PinePad OG - 1.png'),
('PinePad OG', '../image/PinePad/PinePad OG - 2.png'),
('PinePad OG', '../image/PinePad/PinePad OG - 3.png'),
('PinePad Pro', '../image/PinePad/PinePad Pro - 1.png'),
('PinePad Pro', '../image/PinePad/PinePad Pro - 3.png'),
('PinePad Pro', '../image/PinePad/PinePad Pro - 4.png'),
('PinePad Pro', '../image/PinePad/PinePad Pro - 6.png'),
('PinePad Smol', '../image/PinePad/PinePad Smol - 1.png'),
('PinePad Smol', '../image/PinePad/PinePad Smol - 2.png'),
('PinePad Smol', '../image/PinePad/PinePad Smol - 3.png');

CREATE TABLE IF NOT EXISTS PinePods (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    description VARCHAR(255),
    active_noise_cancellation VARCHAR(10),
    tranparency_mode VARCHAR(10),
    battery_lifetime VARCHAR(100),
    price DECIMAL(6,2)
);

INSERT INTO PinePods (name, description, active_noise_cancellation, tranparency_mode, battery_lifetime, price) VALUES
('PinePods Gen X', 'This is where all it started...', 'No', 'No', '5 hr of listening time on one charge', 49),
('PinePods Gen Y', 'Affordable and reliable', 'No', 'No', '6 hr of listening time on one charge', 149),
('PinePods Gen Z', 'Designed for comfort and premium quality', 'Yes', 'No', '8 hr of listening time on one charge', 299),
('PinePods Ultimate', 'Designed for best music experience', 'Yes', 'Yes', '10 hr of listening time on one charge', 599);


CREATE TABLE IF NOT EXISTS pods_image_path (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL
);

INSERT INTO pods_image_path (name, image_path) VALUES
('PinePods Gen X', '../image/PinePods/PinePods Gen X - 1.png'),
('PinePods Gen X', '../image/PinePods/PinePods Gen X - 2.png'),
('PinePods Gen X', '../image/PinePods/PinePods Gen X - 3.png'),
('PinePods Gen Y', '../image/PinePods/PinePods Gen Y - 1.png'),
('PinePods Gen Y', '../image/PinePods/PinePods Gen Y - 2.png'),
('PinePods Gen Y', '../image/PinePods/PinePods Gen Y - 3.png'),
('PinePods Gen Z', '../image/PinePods/PinePods Gen Z - 1.png'),
('PinePods Gen Z', '../image/PinePods/PinePods Gen Z - 2.png'),
('PinePods Gen Z', '../image/PinePods/PinePods Gen Z - 3.png'),
('PinePods Gen Z', '../image/PinePods/PinePods Gen Z - 4.png'),
('PinePods Ultimate', '../image/PinePods/PinePods Ultimate - 1.png'),
('PinePods Ultimate', '../image/PinePods/PinePods Ultimate - 2.png'),
('PinePods Ultimate', '../image/PinePods/PinePods Ultimate - 3.png'),
('PinePods Ultimate', '../image/PinePods/PinePods Ultimate - 4.png'),
('PinePods Ultimate', '../image/PinePods/PinePods Ultimate - 5.png'),
('PinePods Ultimate', '../image/PinePods/PinePods Ultimate - 6.png');

CREATE TABLE IF NOT EXISTS Pineapple_Pencil (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    description VARCHAR(255),
    price DECIMAL(6,2)
);

INSERT INTO Pineapple_Pencil (name, description, price) VALUES
('Pineapple Pencil OG', 'Designed for PineBook OG', 29),
('Pineapple Pencil Gen 2', 'Designed for PineBook Smol', 49),
('Pineapple Pencil Gen 3', 'Designed for PineBook Gamer', 79),
('Pineapple Pencil Pro', 'Designed for PineBook Pro', 199);

CREATE TABLE IF NOT EXISTS pencil_image_path (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL
);

INSERT INTO pencil_image_path (name, image_path) VALUES
('Pineapple Pencil OG', '../image/Accessories/Pineapple Pencil/ Pineapple Pencil OG (Thumbnail).png'),
('Pineapple Pencil Gen 2', '../image/Accessories/Pineapple Pencil/ Pineapple Pencil Gen 2 (Thumbnail).png'),
('Pineapple Pencil Gen 3', '../image/Accessories/Pineapple Pencil/ Pineapple Pencil Gen 3 (Thumbnail).png'),
('Pineapple Pencil Pro', '../image/Accessories/Pineapple Pencil/ Pineapple Pencil Pro (Thumbnail).png');