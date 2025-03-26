<h1>Libros List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Titulo</th>
      <th>Autor</th>
      <th>Prestado</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($libros as $libro): ?>
    <tr>
      <td>
        <a href="<?php echo url_for('libro/edit?id='.$libro->getId()) ?>">
          <?php echo $libro->getId() ?>
        </a>
      </td>
      <td><?php echo $libro->getTitulo() ?></td>
      <td><?php echo $libro->getAutor() ?></td>
      <td><?php echo $libro->getPrestado() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('libro/new') ?>">New</a>
