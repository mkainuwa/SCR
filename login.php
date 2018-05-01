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
    if (isset($_POST['regno']) || isset($_POST['password'])) {
        $regnum = $_POST['regno'];
        $password = $_POST['password'];

        if (empty($_POST['regno']) || empty($_POST['password'])) {

            header('location: index.php?msg2=run');
        } else {

            $query = "SELECT regno, password FROM login WHERE regno=? AND password=? LIMIT 1";

            $stmt = $db->prepare($query);
            $stmt->bind_param("ss", $regnum, $password);
            $stmt->execute();
            $stmt->bind_result($regnum, $password);
            $stmt->store_result();

            if ($stmt->fetch()) {
                $_SESSION['regno'] = $regnum;
                $query = "SELECT regno FROM studentinfo WHERE regno= '".$_SESSION['regno']."'";
                $sql = mysqli_query($db, $query);
                $result = mysqli_fetch_row($sql);
                if($result==TRUE){
                header('location: courseregistration.php');
                }
             else {
                header('location: studentinfo.php');

            }
        }else {
                header("location: index.php?msg=run");
            }
        }
    }
}