<?php/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 16/04/2018
 * Time: 17:16
 */
session_start();
include ('newuser.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="crtloginprfl.css" media="all" rel="stylesheet" type="text/css"/>
</head>
<body>

<div id="header">
    <h1 align="center">COURSE REGISTRATION PORTAL</h1>
</div>
<div id="main">    <a href="index.php"><< Back</a>
    <h2>Login Profile Form</h2>
    <form action="newuser.php" method="POST">
        <table align="center" border="1">

            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="" maxlength="60"></td>
            </tr>
            <tr>
                <td>Reg Number:</td>
                <td><input type="text" name="regno" value="" maxlength="11"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" maxlength="8"></td>
            </tr>
            <tr>
                <td>Re-Type Password:</td>
                <td><input type="password" name="password_retyped" value="" maxlength="8"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Submit"></td>
                <span>
                            <?php if (isset($_GET['msg'])&&!empty($_GET['msg'])){
                                echo "All fields are required";
                            }?></span>
            </tr>
        </table>
    </form>
</div>
<div id="footer">&copy; 2018, MKAINUWA</div>
    </body>
    </html>