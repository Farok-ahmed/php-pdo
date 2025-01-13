<?php

include 'db.php';
$statement = $db->prepare("SELECT * FROM students");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['message'])) {
    if ($_GET['message'] == 'added') {
        $message = "Student added successfully";
    }
    if ($_GET['message'] == 'delete') {
        $message = "Student delete successfully";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Php form</title>
</head>
<body>
<table style="border-collapse: collapse; width: 100%; margin: 20px 0; font-family: Arial, sans-serif;">
    <thead>
    <tr style="background-color: #f2f2f2; text-align: left;">
        <th style="padding: 8px; border: 1px solid #ddd;">Id</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Name</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Age</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($result as $row) {
        echo "<tr style='background-color: #f9f9f9;'>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row['id'] . "</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row['name'] . "</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $row['age'] . "</td>";
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>
            <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
            <a href='delete.php?id=" . $row['id'] . "'>delete</a>
            
            
          </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php
if (isset($message)) {
    echo "<p>" . $message . "</p>";
}
?>
<form action="save.php" method="POST"
      style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">

    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name</label>
        <input type="hidden" name="id">
        <input type="text" placeholder="Enter Your Name" name="name" id="name"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="age" style="display: block; font-weight: bold; margin-bottom: 5px;">Age</label>
        <input type="text" placeholder="Enter Your Age" name="age" id="age"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
        <input type="text" placeholder="Enter Your Email" name="email" id="email"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="text-align: center;">
        <input type="submit" name="submit" value="Submit"
               style="padding: 10px 20px; border: none; background-color: #4CAF50; color: white; font-size: 16px; border-radius: 4px; cursor: pointer;">
    </div>
</form>

</body>
</html>