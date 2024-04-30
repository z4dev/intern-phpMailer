<?php
include "./config/database.php";
$id = $_GET['id'];
$sql = "DELETE FROM tasks WHERE id = $id";
$result = $conn->query($sql);
if ($result) {
    header("Location: viewTask.php");
} else {
    echo "Error deleting task";
}

?>