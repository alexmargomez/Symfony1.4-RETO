<h1>Prestamos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Libro</th>
      <th>Estudiante</th>
      <th>Fecha prestamo</th>
      <th>Fecha devolucion</th>
      <th>Devuelto</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($prestamos as $prestamo): ?>
    <tr>
      <td>  
            <a href="<?php echo url_for('prestamo/edit?id='.$prestamo->getId()) ?>">
                  <?php echo $prestamo->getId(); ?>
            </a>
      </td>
      <td><?php echo $prestamo->getLibroId() ?></td>
      <td><?php echo $prestamo->getEstudianteId() ?></td>
      <td><?php echo $prestamo->getFechaPrestamo() ?></td>
      <td><?php echo $prestamo->getFechaDevolucion() ?></td>
      <td><?php echo $prestamo->getDevuelto() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('prestamo/new') ?>">New</a>
