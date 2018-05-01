<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 18/04/2018
 * Time: 23:25
 */

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){

    if (empty($_POST['regno'])||empty($_POST['password'])){
        echo mysqli_error($db);

    } else {

        $regnum = $_POST['regno'];
        $password = $_POST['password'];
        $query = "SELECT regno, password FROM login WHERE regno=? AND password=? LIMIT 1";

        $stmt = $db->prepare($query);
        $stmt -> bind_param("ss", $regnum, $password);
        $stmt -> execute();
        $stmt-> bind_result($regnum,$password);
        $stmt-> store_result();

        if($stmt-> fetch()){

            $_SESSION['regno'] = $regnum;
            header('location: studentinfo.php');
        }

        else {
            echo "Enter Login Details";
            header('location: index.php');
        }
    }
}


$stmt = $db->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();

if ($stmt->fetch())


    $query = "SELECT username, password FROM admin WHERE username=? AND password=? LIMIIT 1";
$stmt = $db->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();

if ($stmt->fetch())
{
    $_SESSION['username']=$username;
    header('location: adminpage.php');
} else {
    header('location: adminpage.php?msg=run');
}