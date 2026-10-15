CREATE DATABASE minimart_db;
USE minimart_db;

CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    quantity INT(11) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);