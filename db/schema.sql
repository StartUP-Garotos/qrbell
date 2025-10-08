CREATE DATABASE qrbell;

USE qrbell;

CREATE TABLE residencias (
	numero INT NOT NULL UNIQUE,
    proprietario VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL
);