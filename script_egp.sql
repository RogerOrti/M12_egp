DROP DATABASE IF exists egp;
CREATE DATABASE egp;

USE egp;

CREATE TABLE usuaris (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    contrasenya VARCHAR(200)
);

CREATE TABLE rol (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rol VARCHAR(25)
);

CREATE TABLE projectes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50)
);

CREATE TABLE usuaris_projecte_rol (
    id_usuaris INT,
    id_projectes INT,
    id_rol INT,
    PRIMARY KEY (id_usuaris, id_projectes),
    FOREIGN KEY (id_usuaris) REFERENCES usuaris(id),
    FOREIGN KEY (id_projectes) REFERENCES projectes(id),
    FOREIGN KEY (id_rol) REFERENCES rol(id)
);

CREATE TABLE tipus_tasca (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_tipus VARCHAR(25)
);

CREATE TABLE estat_tasca (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_estat VARCHAR(25)
);

CREATE TABLE tasques (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_tasca VARCHAR(50),
    desc_tasca TEXT,
    data_inici DATETIME,
    data_final DATETIME,
    id_usuari INT,
    id_projecte INT,
    id_tipus INT,
    id_estat INT,
    FOREIGN KEY (id_usuari) REFERENCES usuaris(id),
    FOREIGN KEY (id_projecte) REFERENCES projectes(id),
    FOREIGN KEY (id_tipus) REFERENCES tipus_tasca(id),
    FOREIGN KEY (id_estat) REFERENCES estat_tasca(id)
);

    