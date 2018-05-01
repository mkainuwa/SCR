<?php
session_start();
if (!$_SESSION['regno']){
    $_SESSION['msg'] = "You must log in first";
    header("location: index.php");
}
include ('dbconnect.php');
if(isset($_POST['pin'])&&isset($_POST['regno'])){
    $pin = $_POST['pin'];
    $regno = $_POST['regno'];
    if(empty($pin)||empty($regno)){
        echo "All fields required";
    }else{
$query = "SELECT pin,regno FROM payment WHERE pin = $pin AND regno =  '".$_SESSION['regno']."'";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_row($result);
if($row==TRUE){
    header("location: verifypayment.php?msg=run");
}
else{
    header("location: verifypayment.php?msg2=run");

}
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="index.css" media="all" rel="stylesheet" type="text/css">
</head>
<body>
<div id="header">
    <h1 align="center">COURSE REGISTRATION PORTAL</h1>
</div>
<td>&nbsp;</td>
<td>&nbsp;</td>
<br><br>
<td>&nbsp;</td>
<td>&nbsp;</td>

<table>
    <tr></tr>
    <tr></tr>
    <tr><td> <div class="error"><div style="color:#CC0000;">Hello, verify payment to access your examination docket!</div></div></td></tr></table>
<table width="80%" border="0" align="center" cellpadding="3" cellspacing="3">
    <tr>
        <td width="25%" align="left" valign="top" bgcolor=""><ul>
            <li><a href="courseregistration.php">Course Registration</a></li>
            <li><a href="courseform.php">My Course Form</a></li>
            <li><a href="index.php">Log Out</a></li>
        </ul></td>

        <td width="77%" align="left" valign="top"><form id="form1" name="form1" method="post" action="">
                <form action="" method="post">
                <table width="80%" border="0" align="center" cellpadding="3" cellspacing="3">
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td width="33%">Pin  Number</td>
                    <td width="67%"><label for="pin"></label>
                        <input type="text" name="pin" id="pin" /></td>
                </tr>
                <tr>
                    <td width="33%">Registration Number</td>
                    <td width="67%"><label for="serial"></label>
                        <input type="text" name="regno" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
                </tr>
                <tr>
                    <td><span>
                            <?php if (isset($_GET['msg'])&&!empty($_GET['msg'])){
                                echo "Your Payment has been confirmed! Click here to access your <a href=\"mycourses.php\">Examination Docket</a>";
                            }?></span></td>

                    <td><span>
                            <?php if (isset($_GET['msg2'])&&!empty($_GET['msg2'])){
                                echo "You have not paid your school fees!";
                            }?></span></td>
                </tr>

            </table>
        </form></td>
    </tr>
</table>
<br>
<br>
<br>
<div id="footer">&copy; 2018, MKAINUWA</div>
</body>
</html>