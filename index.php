<?php

// Se incluye el archivo 'database.php' que contiene la configuración de la base de datos
require "database.php";

// Se ejecuta una consulta SQL para seleccionar todos los registros de la tabla 'contacts'
$contacts = $conn->query("select * from contacts");


// var_dump($contacts); 
// Esta línea imprimiría información detallada sobre la variable $contacts, útil para depuración.
// die();
// Esta línea detendría la ejecución del script. Puede ser útil para detener la ejecución en un punto específico durante la depuración.

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Encabezado del documento -->

  <meta charset="UTF-8">
  <!-- Configura la codificación de caracteres -->

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Establece el modo de compatibilidad con Internet Explorer -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Configura la vista de acuerdo al tamaño del dispositivo -->

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/darkly/bootstrap.min.css" integrity="sha512-ZdxIsDOtKj2Xmr/av3D/uo1g15yxNFjkhrcfLooZV5fW0TT7aF7Z3wY1LOA16h0VgFLwteg14lWqlYUQK3to/w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Enlace a la hoja de estilos de Bootstrap -->

  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Script de Bootstrap (JavaScript) -->

  <!-- Static Content -->
  <link rel="stylesheet" href="./static/css/index.css" />
  <!-- Enlace a la hoja de estilos personalizada -->

  <title>Contacts App</title>
  <!-- Título de la página -->
</head>

<body>
  <!-- Cuerpo del documento -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Barra de navegación -->

    <div class="container-fluid">
      <!-- Contenedor fluido -->

      <a class="navbar-brand font-weight-bold" href="#">
        <img class="mr-2" src="./static/img/logo.png" />
        ContactsApp
      </a>
      <!-- Marca de la barra de navegación -->

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Botón de la barra de navegación para dispositivos móviles -->

      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Contenido de la barra de navegación -->

        <ul class="navbar-nav">
          <!-- Lista de navegación -->

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <!-- Elemento de lista de navegación: Inicio -->

          <li class="nav-item">
            <a class="nav-link" href="./add.php">Add Contact</a>
          </li>
          <!-- Elemento de lista de navegación: Agregar Contacto -->
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <!-- Contenido principal -->

    <div class="container pt-4 p-3">
      <!-- Contenedor con un poco de espacio superior y relleno (padding) -->

      <div class="row">
        <!-- Fila de la cuadrícula -->

        <?php if ($contacts-> rowCount() == 0) : ?>
          <!-- Si no hay contactos guardados -->

          <div class="col-md-4 mx-auto">
            <!-- Columna de 4 de ancho centrada -->

            <div class="card card-body text-center">
              <!-- Tarjeta con cuerpo de texto centrado -->

              <p>No contacts saved yet</p>
              <!-- Párrafo indicando que no hay contactos guardados -->

              <a href="./add.php">Add One!</a>
              <!-- Enlace para agregar un contacto -->
            </div>
          </div>
        <?php endif ?>

        <?php foreach ($contacts as $contact) : ?>
          <!-- Por cada contacto en el array (Bucle) -->

          <div class="col-md-4 mb-3">
            <!-- Columna de 4 de ancho con margen inferior de 3 -->

            <div class="card text-center">
              <!-- Tarjeta con contenido centrado -->

              <div class="card-body">
                <!-- Cuerpo de la tarjeta -->

                <h3 class="card-title text-capitalize"><?= $contact["name"] ?></h3>
                <!-- Título de la tarjeta: Nombre del contacto -->

                <p class="m-2"><?= $contact["phone_number"] ?></p>
                <!-- Párrafo con el número de teléfono del contacto -->

                <a href="edit.php?id=<?= $contact["id"] ?>" class="btn btn-secondary mb-2">Edit Contact</a>
                <!-- Enlace para editar el contacto -->

                <a href="delete.php?id=<?= $contact["id"] ?>" class="btn btn-danger mb-2">Delete Contact</a>
                <!-- Enlace para eliminar el contacto -->
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </main>
</body>

</html>
