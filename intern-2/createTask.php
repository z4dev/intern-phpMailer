<?php include "./config/database.php"?>
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
        <a href="viewTask.php" class="btn btn-secondary mb-5">see added tasks</a>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Task name</label>
                <input required name="taskName" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <label for="exampleInputEmail1" class="form-label">Task description</label>
                <input required name="taskDescription" type="text" class="form-control mt-2" id="exampleInputEmail1"
                    aria-describedby="emailHelp">

                <button name="add" class="btn btn-success mt-2">add</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['add'])) {
        $taskName = $_POST['taskName'];
        $taskDescription = $_POST['taskDescription'];
        $sql = "INSERT INTO tasks (task_name,task_description) VALUES ('$taskName','$taskDescription')";
        $result = $conn->query($sql);
        if ($result) {
            echo "Task added successfully";
        } else {
            echo "Error adding task";
        }
        
        
    
    }
 


    ?>
</body>


</html>