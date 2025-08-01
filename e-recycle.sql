CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
);

-- Tabla de ubicaciones
CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lugar VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    horario VARCHAR(255) NOT NULL
);

-- Tabla de detecciones
CREATE TABLE IF NOT EXISTS detections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    location_id INT NOT NULL,
    detection_time DATETIME NOT NULL,
    detected_object VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE
);

-- Tabla de centros de reciclaje
CREATE TABLE IF NOT EXISTS recycling_centers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    horario VARCHAR(255)
);

-- Tabla de consejos (tips)
CREATE TABLE IF NOT EXISTS tips (
    id INT AUTO_INCREMENT PRIMARY KEY,
    objeto VARCHAR(100) NOT NULL,
    tip TEXT NOT NULL
);

INSERT INTO locations (id, nombre, descripcion) VALUES (1, 'Ubicación 1', 'Ubicación por defecto para pruebas');
