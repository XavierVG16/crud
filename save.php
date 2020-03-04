<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $edad = $_POST['edad'];
  $query = "INSERT INTO usuarios(nombre, apellido , edad) VALUES ('$nombre', '$apellido','$edad')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("error al registrar.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
