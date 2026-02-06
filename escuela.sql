CREATE DATABASE IF NOT EXISTS escuela;
USE escuela;


CREATE TABLE carreras (
    id_carrera INT AUTO_INCREMENT PRIMARY KEY,
    nombre_carrera VARCHAR(60) NOT NULL,
    activo BOOLEAN DEFAULT TRUE
);


CREATE TABLE turnos (
    id_turno INT AUTO_INCREMENT PRIMARY KEY,
    nombre_turno VARCHAR(20) NOT NULL,
    activo BOOLEAN DEFAULT TRUE
);


CREATE TABLE grados (
    id_grado INT AUTO_INCREMENT PRIMARY KEY,
    numero_grado INT NOT NULL,
    activo BOOLEAN DEFAULT TRUE
);


CREATE TABLE grupos (
    id_grupo INT AUTO_INCREMENT PRIMARY KEY,
    id_carrera INT NOT NULL,
    id_turno INT NOT NULL,
    id_grado INT NOT NULL,
    grupo VARCHAR(5) NOT NULL,
    activo BOOLEAN DEFAULT TRUE,

    FOREIGN KEY (id_carrera) REFERENCES carreras(id_carrera),
    FOREIGN KEY (id_turno) REFERENCES turnos(id_turno),
    FOREIGN KEY (id_grado) REFERENCES grados(id_grado)
);


CREATE TABLE alumnos (
    id_alumno INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(39) NOT NULL,
    apellido_paterno VARCHAR(32) NOT NULL,
    apellido_materno VARCHAR(32),
    id_grupo INT NOT NULL,
    activo BOOLEAN DEFAULT TRUE,

    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo)
);


    