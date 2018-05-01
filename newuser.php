<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 21/04/2018
 * Time: 16:40
 */

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
            $Select = "SELECT regno FROM login WHERE regno = ? 1";
            $query = "INSERT INTO login (name, regno, password) VALUES (?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param("s", $regno);
            $stmt->execute();
            $stmt->bind_result($regno);
            $stmt->store_result();
            $rnum= $stmt->num_rows;
            if ($rnum==0){
                $stmt->close();
                $stmt = $db->prepare($query);
                $stmt->bind_param("sss", $name, $regno, $password);
                $stmt->execute();
                header('location: login.php');

            }
            else {
                echo "Student is already registered";
            }

        } else{
            echo "All fields are required!";
        }

        } else {

            header("location: crtloginprfl.php?msg=run");
        }
    }
