<?php 
require_once('db_connection.php');
$id = $_GET['id'];
$sql = "DELETE FROM tasks WHERE id= $id ";

if(mysqli_query($connection,$sql)){
   header("location:./read.php");
}
else{
    echo "Error".mysqli_error();
}
?>