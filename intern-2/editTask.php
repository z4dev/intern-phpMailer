<?php
include "./config/database.php";
$task_id = $_GET['id'];
$sql = "SELECT * FROM tasks WHERE id = $task_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Task name</label>
                <input type="text" name="task_name" value="<?php echo $row['task_name']?>" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Task description</label>
                <input type="text" name="task_description" value="<?php echo $row['task_description']?>"
                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" name="save" class="btn btn-success text-light">save</button>
            <a type="submit" class="btn btn-secondary" href="viewTask.php">back</a>

        </form>
    </div>
    <?php
if (isset($_POST['save'])) {
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];
    $sql = "UPDATE tasks SET task_name = '$taskName', task_description = '$taskDescription' WHERE id = $task_id";
    $result = $conn->query($sql);
    if($result){

        header("Location: viewTask.php");
        
        
    }
    else{
        echo "Error updating task";
    }
  
}



?>
</body>

</html>