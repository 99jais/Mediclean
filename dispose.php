<?php 
include("connection.php");
$id = $_GET['id'];
$sql = "DELETE from mediclean_db where id=$id";

 if ($connection->query($sql) === TRUE) {
     header('Location: dashboard.php');
 } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
 ?>