-- Create database and tables
CREATE DATABASE IF NOT EXISTS singh_engineering CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE singh_engineering;

CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  slug VARCHAR(255) NOT NULL UNIQUE,
  short_desc TEXT,
  image VARCHAR(255),
  price VARCHAR(50),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS enquiries (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(200),
  email VARCHAR(200),
  mobile VARCHAR(50),
  product_service VARCHAR(255),
  message TEXT,
  ip VARCHAR(45),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,CREATE DATABASE singh_engineering CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE singh_engineering;

CREATE TABLE enquiries (
  id INT AUTO_INCREMENT PRIMARY KEY,
  page VARCHAR(50) NOT NULL,         -- 'contact' or 'quick' etc.
  product_service VARCHAR(255),
  name VARCHAR(150) NOT NULL,
  email VARCHAR(150),
  mobile VARCHAR(50),
  country VARCHAR(100),
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  slug VARCHAR(255) UNIQUE,
  description TEXT,
  image_url TEXT,
  category VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL
);

CREATE TABLE videos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  youtube_embed_url VARCHAR(255) NOT NULL,
  thumb_url VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample admin (password: changeit123)
INSERT INTO admins (username, password_hash) VALUES ('admin', 
  '$2y$10$u1w0sL6QkY0tZ8qv9sK1kOqC2z.CGq/6z6Eo6aRSe6a7d0m2vK4xy'); 
-- Note: above hash is example; create your own with password_hash() in PHP.

-- Sample product
INSERT INTO products (name, slug, short_desc, image, price) VALUES
('MJ-1000 High Pressure Jet Pump','mj-1000','High pressure jet pump suitable for industrial use.','/assets/images/mj-1000.jpg','Contact');

