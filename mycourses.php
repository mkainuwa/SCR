<?php
include ('dbconnect.php');
session_start();if (!$_SESSION['regno']){
    $_SESSION['nsg'] = "You must log in first";
    header("location: index.php");
}
$query = "SELECT id,name, regno FROM login WHERE regno = '".$_SESSION['regno']."'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$id = $row['id'];
$query = "SELECT name, regno,program,image,session FROM studentinfo WHERE studid=$id";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_array($result);

$query = "SELECT time, date,venue FROM timetable WHERE course= 'CSMD01' ";
$result2 = mysqli_query($db,$query);
$row2 = mysqli_fetch_array($result2);

$query = "SELECT time, date,venue FROM timetable WHERE course= 'CSMD02' ";
$result3 = mysqli_query($db,$query);
$row3 = mysqli_fetch_array($result3);

$query = "SELECT time, date,venue FROM timetable WHERE course= 'CSMD03' ";
$result4 = mysqli_query($db,$query);
$row4 = mysqli_fetch_array($result4);
$query = "SELECT time, date,venue FROM timetable WHERE course= 'CSMD04' ";
$result5 = mysqli_query($db,$query);
$row5 = mysqli_fetch_array($result5);
$query = "SELECT time, date,venue FROM timetable WHERE course= 'CSMD05' ";
$result6 = mysqli_query($db,$query);
$row6 = mysqli_fetch_array($result6);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="main.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
    <h1 align="center">COURSE REGISTRATION PORTAL</h1>
</div>
<br>
<br>
<table width="80%" border="0" align="center">
</table>
<p>&nbsp;</p>
<table width="80%" border="0" align="center" cellpadding="3" cellspacing="3">
    <a href="courseregistration.php"><< Back</a>
        <td width="77%" align="left" valign="top"><table width="80%"  align="center" cellpadding="3" cellspacing="3" border="1">
            <tr>
                <th colspan="6" align="center">STUDENT EXAMINATION DOCKET</th>

            </tr>
            <table width="80%" border="1" align="center" cellpadding="3" cellspacing="3">
                <tr>
                    <td width="20%">Student Number :</td>
                    <td width="60%"><?php echo $row['regno'];?></td>
                    <td width="20%" rowspan="4"><?php echo "<img src='img/" . $row['image'] . "' "; ?></td>
                </tr>
                <tr>
                    <td>Student Name :</td>
                    <td><?php echo $row['name'];?></td>
                </tr>
                <tr>
                    <td>Program</td>
                    <td><?php echo $row['program'];?></td>
                </tr>
                <tr>
                    <td>Session :</td>
                    <td><h3><?php echo $row['session'];?> </h3></td>
                </tr>
            </table>
            <form action="courseform.php">
                <table width="80%" align="center" cellpadding="3" cellspacing="3" border="1"> </tr>

                    <tr>
                        <td width="10%">S/NO</td>
                        <td>CODE</td>
                        <td>COURSE TITLE</td>
                        <td>TIME</td>
                        <td>DATE</td>
                        <td>VENUE</td>


                    </tr>
                    <tr>
                        <td width="10%">1</td>
                        <td>CSDM01</td>
                        <td>INTERNET SYSTEM DEVELOPMENT</td>
                        <td><?php echo $row2['time']; ?>:00</td>
                        <td><?php echo $row2['date']; ?></td>
                        <td><?php echo $row2['venue']; ?></td>


                    </tr>
                    <tr>
                        <td width="10%">2</td>
                        <td>CSDM02</td>
                        <td>DATA VISUALISATION</td>
                        <td><?php echo $row3['time']; ?>:00</td>
                        <td><?php echo $row3['date']; ?></td>
                        <td><?php echo $row3['venue']; ?></td>


                    </tr>
                    <tr>
                        <td width="10%">3</td>
                        <td>CSDM03</td>
                        <td>GENERAL ENGINEERING</td>
                        <td><?php echo $row4['time']; ?>:00</td>
                        <td><?php echo $row4['date']; ?></td>
                        <td><?php echo $row4['venue']; ?></td>


                    </tr>
                    <tr>
                        <td width="10%">4</td>
                        <td>CSDM04</td>
                        <td>DATA MANAGEMENT</td>
                        <td><?php echo $row5['time']; ?>:00</td>
                        <td><?php echo $row5['date']; ?></td>
                        <td><?php echo $row5['venue']; ?></td>

                    </tr>
                    <tr>
                        <td width="10%">5</td>
                        <td>CSDM05</td>
                        <td>COLLABORATIVE IT</td>
                        <td><?php echo $row6['time']; ?>:00</td>
                        <td><?php echo $row6['date']; ?></td>
                        <td><?php echo $row6['venue']; ?></td>


                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="4"><input type="submit" name="print" id="print" value="print"/></td>

                    </tr>

                </table>
            </form>
        </table>
            <br>
            <br>
            <br>
  <div id="footer">&copy; 2018, MKAINUWA</div>
</body>
</html>