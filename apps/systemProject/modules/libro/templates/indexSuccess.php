<div class="d-flex justify-content-between align-items-center mb-4">
  <h2>Lista de Libros</h2>
  <a href="<?php echo url_for('libro/new') ?>" class="btn btn-primary">Nuevo</a>
</div>

<div class="row">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Disponible</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($libros as $libro): ?>
      <tr>
        <td><?php echo $libro->getTitulo() ?></td>
        <td><?php echo $libro->getAutor() ?></td>
        <td><?php echo $libro->getPrestado() ? 'No' : 'Sí' ?></td>
        <td>
          <a href="<?php echo url_for('libro/edit?id=' . $libro->getId()) ?>" class="btn btn-warning">Editar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>