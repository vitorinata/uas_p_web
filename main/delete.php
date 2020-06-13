<?php

include_once('dbConfig.php');
$id = $_GET['id'];
$query = "DELETE FROM tabel WHERE id='$id'";
mysqli_query($conn, $query);
header('location:index.php');

?>