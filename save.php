<?php
include 'db.php';
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];


$statement = $db->prepare("INSERT INTO students (name,email,age ) VALUES (?,?,?)");
$statement->execute([$name, $email, $age]);
header("location: form.php?message=added");
