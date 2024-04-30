<?php
include "./config/database.php";

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <a href="createTask.php" class="btn btn-secondary mt-2 ml-2">add task</a>
    <div class="container mt-5">
        <h2>Tasks</h2>
        <?php if ($result->num_rows > 0): ?>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= htmlspecialchars($row["task_name"]) ?></td>
                    <td><?= htmlspecialchars($row["task_description"]) ?></td>
                    <td>
                        <a href="deleteTask.php?id=<?= $row["id"] ?>" onclick="return confirm('Are you sure?')"
                            class="btn btn-danger">Delete</a>
                        <a href="editTask.php?id=<?= $row["id"] ?>" class="btn btn-success">Update</a>
                        <a href="viewOneTask.php?id=<?= $row["id"] ?>" class="btn btn-info">View</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p class="alert alert-warning">0 results</p>
        <?php endif; ?>
    </div>
</body>

</html>