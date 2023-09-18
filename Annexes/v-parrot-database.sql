/* Création de la Base de données */
CREATE DATABASE vParrotDB;

/* Selection de la Base de données */
USE vParrotDB;

/* Création des tables */
CREATE TABLE User
(
    id CHAR(36) PRIMARY KEY NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    role VARCHAR(50) NOT NULL
);

CREATE TABLE Car 
(
    id CHAR(36) PRIMARY KEY NOT NULL,
    brand VARCHAR(50) NOT NULL,
    model VARCHAR(150) NOT NULL,
    price INT NOT NULL,
    entryIntoService DATE NOT NULL,
    milage INT NOT NULL,
    gearbox VARCHAR(50),
    license VARCHAR(50),
    color VARCHAR(50),
    doorsNb INT,
    seatNb INT,
    fiscalPower INT,
    dinPower INT,
    consumption DECIMAL(3, 1),
    critAir INT,
    fuel VARCHAR(20) NOT NULL,
    description TEXT,
    car_options,
    picture_names
);

CREATE TABLE Review 
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    comment TEXT NOT NULL,
    rate INT
);

CREATE TABLE TemporaryReview 
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    comment TEXT NOT NULL,
    rate INT
);

CREATE TABLE Repair
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(150) NOT NULL,
    description TEXT NOT NULL
);

CREATE TABLE Contact
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(14),
    message TEXT
);

CREATE TABLE Garage_State
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    status VARCHAR(15) NOT NULL
);

/* Insertion des données */
INSERT INTO User
VALUES
    ('0508fd52-2fba-11ee-be56-0242ac120002', 'v.parrot@hotmail.com', '{mot de passe}', 'Vincent', 'Parrot', 'admin')


/* Les autres valeurs seront insérées directement via l'application symfony */