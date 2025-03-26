<div class="d-flex justify-content-between align-items-center mb-4">
  <h2>Lista de Préstamos</h2>
  <a href="<?php echo url_for('prestamo/new') ?>" class="btn btn-primary">Nuevo Préstamo</a>
</div>

<div class="row">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Libro</th>
        <th>Estudiante</th>
        <th>Fecha Préstamo</th>
        <th>Fecha Devolución</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($prestamos as $prestamo): ?>
      <tr>
        <td><?php echo $prestamo->getLibro()->getTitulo() ?></td>
        <td><?php echo $prestamo->getEstudiante()->getNombre() ?></td>
        <td><?php echo $prestamo->getFechaPrestamo() ?></td>
        <td><?php echo $prestamo->getFechaDevolucion() ?></td>
        <td>
          <a href="<?php echo url_for('prestamo/edit?id=' . $prestamo->getId()) ?>" class="btn btn-warning">Editar</a>
          <a href="<?php echo url_for('prestamo/entregar?id=' . $prestamo->getId()) ?>" class="btn btn-success">Entregar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>