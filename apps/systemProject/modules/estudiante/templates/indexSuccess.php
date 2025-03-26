<div class="d-flex justify-content-between align-items-center mb-4">
  <h2>Lista de Estudiantes</h2>
  <a href="<?php echo url_for('estudiante_new') ?>" class="btn btn-primary">Nuevo</a>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Email</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($estudiantes as $estudiante): ?>
        <tr>
          <td><?php echo $estudiante->getNombre() ?></td>
          <td><?php echo $estudiante->getApellidos() ?></td>
          <td><?php echo $estudiante->getEmail() ?></td>
          <td>
            <a href="<?php echo url_for('estudiante/edit?id=' . $estudiante->getId()) ?>" class="btn btn-warning">Editar</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>