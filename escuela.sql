create database escuela;
use escuela;
CREATE TABLE alumnos (
    id_alumno INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(39) NOT NULL,
    apellido_paterno VARCHAR(32) NOT NULL,
    apellido_materno VARCHAR(32),
    id_grupo INT NOT NULL,
    activo BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo)
);


CREATE TABLE grupos (
    id_grupo INT AUTO_INCREMENT PRIMARY KEY,
    id_carrera INT NOT NULL,
    turno ENUM('Matutino', 'Vespertino') NOT NULL,
    grado INT NOT NULL,
    grupo VARCHAR(5) NOT NULL,
    FOREIGN KEY (id_carrera) REFERENCES carreras(id_carrera)
);

    
CREATE TABLE carreras (
    id_carrera INT AUTO_INCREMENT PRIMARY KEY,
    nombre_carrera VARCHAR(60) NOT NULL,
    clave_carrera VARCHAR(10) UNIQUE,
    duracion_semestres INT NOT NULL,
    activa BOOLEAN DEFAULT TRUE
);

    
