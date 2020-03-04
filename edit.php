<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM usuarios WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $edad = $row['edad'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $edad = $_POST['edad'];

  $query = "UPDATE usuarios set nombre = '$nombre', apellido = '$apellido', edad = '$edad' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Usuario actuslizado corretamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre">
        </div>
        <div class="form-group">
         <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Apellido">
        </div>
        <div class="form-group">
         <input name="edad" type="text" class="form-control" value="<?php echo $edad; ?>" placeholder="Apellido">
        </div>


        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
