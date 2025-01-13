<?php
include 'db.php';
$id = $_GET["id"];
$statement = $db->prepare("SELECT * FROM students WHERE id=?");
$statement->execute([$id]);
$student = $statement->fetch(PDO::FETCH_ASSOC);
?>

<form action="update.php" method="POST"
      style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">

    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name</label>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" placeholder="Enter Your Name" name="name" id="name" value="<?php echo $student['name'] ?>"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="age" style="display: block; font-weight: bold; margin-bottom: 5px;">Age</label>
        <input type="text" placeholder="Enter Your Age" name="age" id="age" value="<?php echo $student['age'] ?>"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
        <input type="text" placeholder="Enter Your Email" name="email" id="email"
               value="<?php echo $student['email'] ?>"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="text-align: center;">
        <input type="submit" name="update" value="Update"
               style="padding: 10px 20px; border: none; background-color: #4CAF50; color: white; font-size: 16px; border-radius: 4px; cursor: pointer;">
    </div>
</form>
