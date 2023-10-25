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

  <?php $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)?>
  <?php if ($uri == "/contacts-app/" || $uri == "/contacts-app/index.php"):?>
    <script defer src="./static/js/welcome.js"></script>
  <?php endif ?>
  

  <title>Contacts App</title>
  <!-- Título de la página -->
</head>

<body>
  <!-- Cuerpo del documento -->

  <?php require "parcial/navbar.php" ?>

  <main>

    <!-- Content here -->
