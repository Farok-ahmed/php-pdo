<?php

include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];

// Corrected UPDATE query
$statement = $db->prepare("UPDATE students SET name = ?, email = ?, age = ? WHERE id = ?");
$statement->execute([$name, $email, $age, $id]);

header("Location: form.php?message=updated"); // Changed 'added' to 'updated' for clarity
exit; // Always use exit after header redirection
?>
