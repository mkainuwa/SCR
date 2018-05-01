<?php
error_reporting(E_ERROR | E_PARSE);
include ('dbconnect.php');
include ('regstud.php');
if (!$_SESSION['regno']){
    $_SESSION['msg'] = "You must log in first";
    header("location: index.php");
}
$query = "SELECT id,name, regno FROM login WHERE regno = '".$_SESSION['regno']."'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$id = $row['id'];
$query = "SELECT name, regno,program, session,image FROM studentinfo WHERE studid=$id";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
    <h1 align="center">COURSE REGISTRATION PORTAL</h1>
</div>
<br>
<br>
<table width="70%" border="0" align="center" cellpadding="3" cellspacing="3">
    <a href="courseregistration.php"><< Back</a>
    <tr>
        <th colspan="6" align="center">STUDENT COURSE REGISTRATION FORM</th>

    </tr>  <table width="70%" border="1" align="center" cellpadding="3" cellspacing="3">
    <br>

    <br>
    <tr>
        <td width="20%"><strong>Student Number :</strong></td>
        <td width="60%"><?php echo $row['regno'];?></td>
        <td width="20%" rowspan="4" ><?php echo "<img src='img/".$row['image']."' "; ?></td>
    </tr>
    <tr>
        <td width="25%"><strong>Student Name :</strong></td>
        <td width="50%"> <?php echo $row['name'];?></td>

    </tr>
    <tr>
        <td width="25%"><strong>Program :</strong></td>
        <td width="50%"> <?php echo $row['program'];?></td>

    </tr>
    <tr>
        <td width="25%"><strong>Session:  </strong></td>
        <td width="50%"><?php echo $row['session'];?></td>

    </tr>
</table>
    <table width="70%"  align="center" cellpadding="4" cellspacing="4" border="1"> </tr>

        <tr>
            <td width="6%">S/NO</td>
            <td >CODE</td>
            <td>COURSE TITLE</td>
            <td>UNIT </td>
            <td>LEVEL </td>
            <td>SEMISTER</td>
            <td>TUTOR</td>
        </tr>
        <tr>
            <td width="6%">1</td>
            <td>CSDM01</td>
            <td>INTERNET SYSTEM DEVELOPMENT</td>
            <td>4</td>
            <td>MSc</td>
            <td>1</td>
            <td>-</td>


        </tr>
        <tr>
            <td width="6%">2</td>
            <td>CSDM02</td>
            <td>DATA VISUALISATION</td>
            <td>4</td>
            <td>MSc</td>
            <td>1</td>
            <td>-</td>


        </tr>
        <tr>
            <td width="6%">3</td>
            <td>CSDM03</td>
            <td>GENERAL ENGINEERING</td>
            <td>4</td>
            <td>MSc</td>
            <td>1</td>
            <td>-</td>


        </tr>
        <tr>
            <td width="6%">4</td>
            <td>CSDM04</td>
            <td>DATA MANAGEMENT</td>
            <td>4</td>
            <td>MSc</td>
            <td>1</td>
            <td>-</td>


        </tr>
        <tr>
            <td width="6%">5</td>
            <td>CSDM05</td>
            <td>COLLABORATIVE IT</td>
            <td>4</td>
            <td>MSc</td>
            <td>1</td>
            <td>-</td>


        </tr><tr><td colspan="7"> <strong> Total Units Registered : </strong>20</td></tr><tr>

    </table></td>
    </tr>
</table>
<br>
<br>
<div id="footer">&copy; 2018, MKAINUWA</div>
</body>
</html>