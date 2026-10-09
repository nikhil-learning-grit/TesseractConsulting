CREATE DATABASE IF NOT EXISTS tesseract_db; 
USE tesseract_db; 

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL, 
    email VARCHAR(255) NOT NULL UNIQUE, 
    password_hash VARCHAR(255), 
    country VARCHAR(100), 
    role ENUM('user' , 'admin') NOT NULL DEFAULT 'user', 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 

CREATE TABLE documents (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(255) NOT NULL, 
    description TEXT, 
    file_path VARCHAR(500) NOT NULL, 
    access_type ENUM('free','restricted') NOT NULL DEFAULT 'restricted',
    uploaded_by INT UNSIGNED NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_documents_user
        FOREIGN KEY (uploaded_by)
        REFERENCES users(id)
        ON DELETE RESTRICT 
        ON UPDATE CASCADE
); 

