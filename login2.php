<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 13/04/2018
 * Time: 23:58
 */

session_start();
$error;

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'scr_database');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])) {
    if (isset($_POST['username']) || isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($_POST['username']) || empty($_POST['password'])) {

            header('location: adminlogin.php?msg2=run');
        } else {

            $query = "SELECT username, password FROM admin WHERE username=? AND password=? LIMIT 1";

            $stmt = $db->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->bind_result($username, $password);
            $stmt->store_result();

            if ($stmt->fetch()) {
                header("location: adminpage.php");
            }else {
                header("location: adminlogin.php?msg=run");
            }
        }
    }
    else {
            header("location: index.php?msg=run");
        }
}