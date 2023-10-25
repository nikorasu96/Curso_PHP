<?php
// Se incluye el archivo 'database.php' que contiene la configuración de la base de datos
require "database.php";

$id = $_GET["id"];

$statement = $conn->prepare("SELECT * FROM contacts WHERE id = :id LIMIT 1");
$statement->execute([":id" => $id]);

if ($statement->rowCount() == 0) {
  http_response_code(404);
  echo ("HTTP 404 NOT FOUND");
  return;
}


$contact = $statement->fetch(PDO::FETCH_ASSOC);

// Se inicializa una variable de error
$error = null;

// Se verifica si el formulario se envió usando el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Se verifica si alguno de los campos está vacío
  if (empty($_POST["name"]) || empty($_POST["phone_number"])) {
    $error = "Please fill all the fields."; // Se asigna un mensaje de error
  } else if (strlen($_POST["phone_number"]) < 9) {
    $error = "Phone number must be at least 9 characters."; // Se verifica la longitud del número de teléfono
  } else {
    // Si no hay errores, se asignan los valores del formulario a variables
    $name = $_POST["name"];
    $phoneNumber = $_POST["phone_number"];

    // Se prepara una consulta SQL para insertar los datos en la base de datos
    $statement = $conn->prepare("update contacts SET name = :name, phone_number = :phone_number where id = :id");
    $statement->execute([
      ":id" => $id,
      ":name" => $_POST["name"],
      ":phone_number" => $_POST["phone_number"],
    ]);
    // Se redirige al usuario a una página
    header("Location: home.php");
  }
}
?>


<?php require "parcial/header.php" ?>


    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Add New Contact</div>
            <div class="card-body">
              <?php if ($error) : ?>
                <p class="text-danger">
                  <? $error ?>
                </p>
              <?php endif ?>
              <form method="post" action="edit.php?id= <?= $contact["id"] ?>">
                <div class="mb-3 row">
                  <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                  <div class="col-md-6">
                    <input value="<?= $contact["name"] ?> " id="name" type="text" class="form-control" name="name" required autocomplete="Name" autofocus>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>

                  <div class="col-md-6">
                    <input value="<?= $contact["phone_number"] ?> " id="phone_number" type="tel" class="form-control" name="phone_number" required autocomplete="phone_number" autofocus>
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php require "parcial/footer.php" ?>
