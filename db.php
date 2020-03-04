<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'Deber'
) or die(mysqli_erro($mysqli));

?>
