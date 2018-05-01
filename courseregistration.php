<?php
include ('dbconnect.php');
session_start();
if (!$_SESSION['regno']){
    $_SESSION['msg'] = "You must log in first";
    header("location: index.php");
}
$query = "SELECT name, regno,program,image,session FROM studentinfo ";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>COURSE REGISTRATION PORTAL</title>
    <link href="registration.css" rel="stylesheet" type="text/css" />
</head>
<body>
<br>
<br>
<div id="header">
    <h1 align="center">COURSE REGISTRATION PORTAL</h1>
</div>
<br><br>
<br><br>
<br><br>
</table>
</table>
<table width="80%" border="0" align="center" cellpadding="9" cellspacing="3">
    <tr><td>Session : 2018/2019 </td></tr>
    <tr>
        <td width="32%" align="left" valign="top" bcolor="#F2F2F2"><ul>
            <li><a href="studentinfo.php">Course Registration</a></li>
            <li><a href="courseform.php">My Course Form</a></li>
            <li><a href="verifypayment.php">Verify Payment</a></li>
            <li><a href="mygrades.php">My Grades</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul></td>
        <td width="68%" align="justify" valign="top" ><form id="drop_list" name="drop_list" method="post" action="">
            <p>Welcome to your personal Page.</p>
            <p>On this page, You can:</p>
            <blockquote>
                <blockquote>
                    <p>&nbsp;&nbsp;1. Verify Your Payment</p>
                    <p>&nbsp;&nbsp;2. Register Your Courses</p>
                    <p>&nbsp;&nbsp;3. Print Your Registration Form, and</p>
                    <p>&nbsp;&nbsp;4. View Your Grades</p>
                </blockquote>
            </blockquote>
            <table width="70%" border="1" align="center" cellpadding="3" cellspacing="3"></table>
        </form></td>
    </tr>
</table>
<br><br>
<br><br>
<br><br>
<br><br>
<div id="footer">&copy; 2018, MKAINUWA</div>
</body>
</html>