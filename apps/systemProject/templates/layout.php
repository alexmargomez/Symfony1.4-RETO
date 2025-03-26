<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php include_slot('title', 'Mi Aplicación Symfony') ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    .content {
      flex: 1;
    }
    header {
      background-color: #007bff; /* Cambia este color según tus necesidades */
      color: white;
      padding: 20px 0;
      text-align: center;
      width: 100%;
      margin-bottom: 20px;
    }
    h1 {
      font-weight: bold;
    }
    footer {
      text-align: center;
    }
    .nav-link.active {
      background-color: #007bff !important;
      color: white !important;
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <a href="/" style="color: white; text-decoration: none;">
        <h1><?php include_slot('header', 'Sistema de gestión bibliotecaria') ?></h1>
      </a>
    </div>
  </header>
  <nav class="mb-4">
    <ul class="nav nav-pills container">
      <li class="nav-item">
        <a class="nav-link <?php echo $sf_request->getParameter('module') == 'libro' ? 'active' : '' ?>" href="<?php echo url_for('libro/index') ?>">Libros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $sf_request->getParameter('module') == 'estudiante' ? 'active' : '' ?>" href="<?php echo url_for('estudiante/index') ?>">Estudiantes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $sf_request->getParameter('module') == 'prestamo' ? 'active' : '' ?>" href="<?php echo url_for('prestamo/index') ?>">Prestamos</a>
      </li>
    </ul>
  </nav>

  <main class="container content">
    <?php echo $sf_content ?>
  </main>

  <footer class="container">
    <p>&copy; 2025 Symfony 1.4 - Alexmar Gómez</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>
</html>