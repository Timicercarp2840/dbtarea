-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

-- Crear la tabla 1: Usuarios
CREATE TABLE IF NOT EXISTS Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    edad INT,
    email VARCHAR(100),
    direccion VARCHAR(200)
);

-- Crear la tabla 2: Productos
CREATE TABLE IF NOT EXISTS Productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    precio DECIMAL(10, 2),
    categoria VARCHAR(50),
    cantidad_disponible INT
);

-- Crear la tabla 3: Pedidos
CREATE TABLE IF NOT EXISTS Pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha_pedido DATE,my_database
    total_pedido DECIMAL(10, 2),
    estado VARCHAR(50),
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

-- Crear la tabla 4: DetallesPedido
CREATE TABLE IF NOT EXISTS DetallesPedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_producto INT,
    cantidad INT,
    precio_unitario DECIMAL(10, 2),
    FOREIGN KEY (id_pedido) REFERENCES Pedidos(id),
    FOREIGN KEY (id_producto) REFERENCES Productos(id)
);
