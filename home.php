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

<?php require "parcial/header.php" ?>

<main>
  <!-- Contenido principal -->

  <div class="container pt-4 p-3">
    <!-- Contenedor con un poco de espacio superior y relleno (padding) -->

    <div class="row">
      <!-- Fila de la cuadrícula -->

      <?php if ($contacts->rowCount() == 0) : ?>
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


  <?php require "parcial/footer.php" ?>
