<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Get data => Show => Edit => Update-->
    <?php
    require_once("db_connection.php");
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $id "; //get data
    $query = mysqli_query($connection,$sql);
    $data = mysqli_fetch_assoc($query);
    //Update
    if(isset($_POST['updateBtn'])){
        $errorMessage = "";
        $newTask = $_POST['taskName'];
        if($newTask == null || $newTask == ""){
           $errorMessage = "Task Name is required";
        }
        else{
            $sql = "UPDATE tasks SET name='$newTask' WHERE id=$id";//Update Data
            if(mysqli_query($connection,$sql)){
                header("location:read.php");
            }
            else{
                echo "error".mysqli_error();
            }
        }
    }
    ?>
    <form method="POST">
        <h1>Update Task</h1>
        <a href="read.php">Task List</a><br><br>
        <div class="form-group">
            <label for="name">Task</label>
            <!-- Show Old Data -->
            <input type="text" name="taskName" value="<?php echo $data['name'] ?>" placeholder="Enter yor task name"><br><br>
            <small style='color:red'><?PHP echo $errorMessage;?></small><br>
            <button name = "updateBtn">Update</button>
        </div>
    </form>
 </body>
</html>