<?PHP
$connection = mysqli_connect('localhost','root','','todo_list');
if(!$connection){
    die("Connection Fail! " . mysqli_connect_error());
}

 ?>
