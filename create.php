<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
</head>
<body>
<?php  
    require_once("db_connection.php");
    $errorMessage = "";
        if(isset($_POST['addBtn'])){
            $taskName = $_POST['taskName'];
            if($taskName == null || $taskName == ""){
                $errorMessage = "Task Field is required";
            }
            else{
                $query = "INSERT INTO tasks (name) VALUES ('$taskName')";
                if(mysqli_query($connection,$query)){
                    header("location:./read.php");
                }
                else{
                    echo "Query Fail..".mysqli_error();
                }
            }
        }
    ?>
    <h1> Create Task</h1>
    <a href="read.php">Task List</a><br><br>
    <form method="POST">
        <div class="form-group">
            <label for="name">Task</label>
            <input type="text" name="taskName" id="name" placeholder="Enter yor task name"><br>
            <small style="color:red ;"><?php echo $errorMessage; ?></small><br>
            <button name = "addBtn">Add</button>
        </div>
    </form>
</body>
</html>