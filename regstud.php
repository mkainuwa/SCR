<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 21/04/2018
 * Time: 13:02
 */
session_start();
$id = $_GET['id'];
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['submit'])){
    if (isset($_POST['name'])&&isset($_POST['regno'])&&isset($_POST['program'])&&isset($_POST['session'])&&isset($_POST['dob'])&&isset($_POST['sex'])&&isset($_POST['maritalstatus'])&&isset($_POST['email'])&&isset($_POST['phonenum'])&&isset($_POST['pha'])&&isset($_POST['address'])||isset($_POST['image'])) {
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $regno = mysqli_real_escape_string($db, $_POST['regno']);
        $program = mysqli_real_escape_string($db, $_POST['program']);
        $session = mysqli_real_escape_string($db, $_POST['session']);
        $dob = mysqli_real_escape_string($db, $_POST['dob']);
        $sex = mysqli_real_escape_string($db, $_POST['sex']);
        $maritalstatus = mysqli_real_escape_string($db, $_POST['maritalstatus']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $phonenum = mysqli_real_escape_string($db, $_POST['phonenum']);
        $pha = mysqli_real_escape_string($db, $_POST['pha']);
        $address = mysqli_real_escape_string($db, $_POST['address']);
        $image_name = $_FILES["image"]["name"];
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
// Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        if (!empty($name) || !empty($regno) || !empty($program) || !empty($session) || !empty($dob) || !empty($sex) || !empty($maritalstatus) || !empty($email) || !empty($phonenum) || !empty($pha) || !empty($address)) {
            $Select = "SELECT studid FROM studentinfo WHERE studid = ? 1";
            $query = "INSERT INTO studentinfo (name, regno, program, session, dob, sex, maritalstatus, email, phonenum, pha, address, image,studid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $db->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($id);
            $stmt->store_result();
            $rnum= $stmt->num_rows;
            if ($rnum==0){
            $stmt->close();
            $stmt = $db->prepare($query);
            $stmt->bind_param("sssssssssssss", $name, $regno, $program, $session, $dob, $sex, $maritalstatus, $email, $phonenum, $pha, $address,$image_name, $id);
            $stmt->execute();
            if ($stmt==TRUE){

                header('location: courseform.php');
            }


            }
            else {
                echo "Student is already registered";
            }

        } else{
            echo "All fields are required!";
        }
    }
}

?>