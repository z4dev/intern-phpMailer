<?php

$conn = new mysqli("localhost", "root", "", "intern"); 


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}