-- Create Melenium database
CREATE DATABASE IF NOT EXISTS melenium_panel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Create user and grant privileges
GRANT ALL PRIVILEGES ON melenium_panel.* TO 'melenium_user'@'%';
FLUSH PRIVILEGES;

-- Use the database
USE melenium_panel;

-- You can add initial table structures here if needed