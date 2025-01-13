<?php
// Enable error reporting for debugging purposes


include 'db.php'; // Ensure the database connection is included

// Check if the 'id' parameter is valid
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare the DELETE statement
        $statement = $db->prepare("DELETE FROM students WHERE id = ?");

        // Execute the statement with the ID
        $statement->execute([$id]);

        // Redirect with a success message
        header("Location: form.php?message=delete");
        exit; // Ensure no further code is executed after redirect

    } catch (Exception $e) {
        // Log the error for debugging purposes
        error_log("Error: " . $e->getMessage());

        // Optionally redirect with an error message
        header("Location: form.php?message=0");
        exit;
    }
} else {
    // Invalid or missing ID, redirect with an error
    header("Location: form.php?message=0");
    exit;
}
