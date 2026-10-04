-- Base datos hackathon (MariaDB)
DROP DATABASE IF EXISTS hackaton;
CREATE DATABASE hackaton CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE hackaton;

-- aqui hago la tabla de los grupos de clase 
CREATE TABLE taldeak (
    id      INT AUTO_INCREMENT PRIMARY KEY,
    izena   VARCHAR(100) NOT NULL,
    puntuak INT NOT NULL DEFAULT 0
) ENGINE=InnoDB;

-- tabla de los alumnos de cada clase
--  aqui uso el ON DELETE CASCADE para que cuando se borre una clase se borre tambien  a los compañeros de esa clase 
CREATE TABLE partaideak (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    izena      VARCHAR(100) NOT NULL,
    herrialdea VARCHAR(100) NOT NULL,
    taldea_id  INT NOT NULL,
    FOREIGN KEY (taldea_id) REFERENCES taldeak(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Datos de prueba
INSERT INTO taldeak (izena, puntuak) VALUES ('WES taldea', 6), ('PAG taldea', 1);
INSERT INTO partaideak (izena, herrialdea, taldea_id) VALUES
    ('Hugo', 'Sestao', 1),
    ('maroto', 'Basauri', 1),
    ('danet', 'bagatza', 1),
    ('saltxo', 'portugalete', 1);
