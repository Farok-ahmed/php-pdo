<?php
/*
 * How To connect Mysql database using PDO
 * PDO
 */

$host = "localhost";
$user = "root";
$password = "admin123456";
$dbname = "pdodb";
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
//    echo "db connected";
} catch (PDOException $e) {
    echo $e->getMessage();
}

//    echo "Hello World!";
//    echo "<br>";
//    $food = "I love ead Pizza";
//    echo $food;

/*
 * How to Get data using pdo
 * get data
 */

//    $storage = $db->prepare("SELECT * FROM users");
//    $storage = $db->prepare("SELECT * FROM users ORDER BY id DESC");
//    $storage = $db->prepare("SELECT * FROM users ORDER BY id ASC");
//    $storage = $db->prepare("SELECT * FROM users ORDER BY firstName DESC ");
$storage = $db->prepare("SELECT * FROM users LIMIT 4");
$storage->execute();
$result = $storage->fetchAll(PDO::FETCH_ASSOC);

$storage = $db->prepare("SELECT firstName,lastName FROM users");
$storage->execute();
//      $users = $storage->fetchAll(PDO::FETCH_OBJ);
//      $users = $storage->fetchAll(PDO::FETCH_NUM);
$users = $storage->fetchAll(PDO::FETCH_ASSOC);

// Count
$statement = $db->prepare("SELECT COUNT(id) as 'Total Users' FROM users ");
$statement->execute();
$total = $statement->fetch(PDO::FETCH_ASSOC);


// get single user data
//    $userData = $db->prepare("SELECT * FROM users WHERE id=?");
$userData = $db->prepare("SELECT * FROM users WHERE lastName=?");
$userData->execute(['Islam']);
$user = $userData->fetch(PDO::FETCH_ASSOC);

// Between
$statementB = $db->prepare("SELECT * FROM users WHERE age BETWEEN 20 AND 30");
$statementB->execute();
$usersB = $statementB->fetchAll(PDO::FETCH_ASSOC);

// Like
$statementLike = $db->prepare("SELECT * FROM users WHERE lastName LIKE ?");
$statementLike->execute(['A%']);
$usersLike = $statementLike->fetchAll(PDO::FETCH_ASSOC);

// User Data Insert

//$statementInsert = $db->prepare("INSERT INTO users (firstName,lastName,age,phone,email,city_id) VALUES(?,?,?,?,?,?)");
//$statementInsert->execute(['Md Salam','Mia','25','01908313996','mdsalam@gmail.com',1]);


// User Data update
//$statementUpdate = $db->prepare("UPDATE users SET firstName=?,lastName=? WHERE id=?");
//$statementUpdate->execute(['md aziz hakim','hakim',6]);

// User Data Delete
//    $statementDelete = $db->prepare("DELETE FROM users WHERE id=?");
//    $statementDelete->execute([7]);

// Inner Join
//$statementJoin = $db->prepare("SELECT u.firstName, c.city_name
//                                    FROM users u
//                                    JOIN cities c
//                                    ON u.city_id = c.city_id");

$statementJoin = $db->prepare("SELECT u.firstName, c.city_name 
                                    FROM users u
                                    JOIN cities c
                                    ON u.city_id = c.city_id
                                    WHERE c.city_name = ?
                                    ");
$statementJoin->execute(['Khulna']);
$usersJoin = $statementJoin->fetchAll(PDO::FETCH_ASSOC);


echo "<table>";
echo '<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
</tr>';
//     data  showing foreach loop
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['firstName'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<pre>";
// Total Users
echo "Total Users";
print_r($total);
// single user
print_r($user);
// all Users
print_r($users);
//    print_r($result);

// Age Between;
print_r($usersB);

// Like
print_r($usersLike);

// inner join
print_r("Inner Join");
print_r($usersJoin);

echo "</pre>";

