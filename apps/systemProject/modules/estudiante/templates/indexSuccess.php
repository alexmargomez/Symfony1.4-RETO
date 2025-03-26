<h1>Estudiantes List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($estudiantes as $estudiante): ?>
    <tr>
      <td>
        <a href="<?php echo url_for('estudiante/edit?id=' . $estudiante->getId()) ?>">
          <?php echo $estudiante->getId(); ?>
        </a>
      </td>
      <td><?php echo $estudiante->getNombre(); ?></td>
      <td><?php echo $estudiante->getApellidos(); ?></td>
      <td><?php echo $estudiante->getEmail(); ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('estudiante/new') ?>">New</a>
