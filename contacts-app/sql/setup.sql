DROP DATABASE IF EXISTS dispositivos_fonca;

CREATE DATABASE dispositivos_fonca;

USE dispositivos_fonca;

CREATE TABLE dispositivos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    link VARCHAR(255)
);

INSERT INTO dispositivos (nombre, link) VALUES ("Pepe", "123456789");
