<?php

require "database.php";

$id = $_GET["id"];

$statement = $conn->prepare("select * FROM contacts where id = :id");
$statement->execute([':id' => $id]);

if($statement-> rowCount() == 0){
  http_response_code(404);
  echo("HTTP 404 NOT fOUND");
  exit();
}


$conn->prepare("DELETE FROM contacts where id = :id")->execute([':id' => $id]);
// Ejecutamos la consulta, pasando el valor de $id como el valor del parámetro :id.
// En este caso, estamos pasando un arreglo asociativo donde ':id' es el nombre del parámetro en la consulta y $id es el valor que queremos asignar.



//$statement->bindParam(":id", $id);
// Vinculamos el valor de la variable $id al parámetro :id en la consulta.

//$statement->execute();
// Ejecutamos la consulta.

header("Location: index.php");
