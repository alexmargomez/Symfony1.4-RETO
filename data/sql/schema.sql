CREATE TABLE estudiantes (id INT AUTO_INCREMENT, nombre VARCHAR(255), apellidos VARCHAR(255), email VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE libros (id INT AUTO_INCREMENT, titulo VARCHAR(255), autor VARCHAR(255), prestado TINYINT(1), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE prestamos (id INT AUTO_INCREMENT, libro_id INT, estudiante_id INT, fecha_prestamo DATE, fecha_devolucion DATE, devuelto TINYINT(1), INDEX libro_id_idx (libro_id), INDEX estudiante_id_idx (estudiante_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE prestamos ADD CONSTRAINT prestamos_libro_id_libros_id FOREIGN KEY (libro_id) REFERENCES libros(id) ON DELETE CASCADE;
ALTER TABLE prestamos ADD CONSTRAINT prestamos_estudiante_id_estudiantes_id FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id) ON DELETE CASCADE;
