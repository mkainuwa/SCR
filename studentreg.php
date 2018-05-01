<?php/**
* Created by PhpStorm.
* User: DELL
* Date: 16/04/2018
* Time: 17:16
*/
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'scr_database');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (!$db) {
die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
if (isset($_POST['name']) && isset($_POST['regno']) && isset($_POST['password']) && isset($_POST['password_retyped'])) {

$name = $_POST['name'];
$regno = $_POST['regno'];
$password = $_POST['password'];
$password_retyped = $_POST['password_retyped'];

if (!empty($name) || !empty($regno) || !empty($password) || !empty($password_retyped)) {

$query = "INSERT INTO `login`(`name`, `regno`, `password`) VALUES ('$name', '$regno' , '$password')";
$result = mysqli_query($db, $query);
if ($result){
header("location: index.php?success");
}
else{

echo mysqli_error($db);
}
} else {

echo "All fields required";
}
}
}