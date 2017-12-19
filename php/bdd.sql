CREATE DATABASE IF NOT EXISTS projetTrello

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP
    ON Tables, Users, Tags
    to 'admin'@'localhost';