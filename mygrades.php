<?php
include ('dbconnect.php');
session_start();
if (!$_SESSION['regno']){
    $_SESSION['msg'] = "You must log in first";
    header("location: index.php");
}
$query = "SELECT id,name, regno FROM login WHERE regno = '".$_SESSION['regno']."'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$id = $row['id'];

$query = "SELECT name, regno,program,image,session FROM studentinfo WHERE studid=$id ";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_array($result);

$query = "SELECT total, grade FROM result WHERE course= 'CSMD01' ";
$result2 = mysqli_query($db,$query);
$row2 = mysqli_fetch_array($result2);

$query = "SELECT total, grade FROM result WHERE course= 'CSMD02' ";
$result3 = mysqli_query($db,$query);
$row3 = mysqli_fetch_array($result3);
$query = "SELECT total, grade FROM result WHERE course= 'CSMD03' ";
$result4 = mysqli_query($db,$query);
$row4 = mysqli_fetch_array($result4);
$query = "SELECT total, grade FROM result WHERE course= 'CSMD04' ";
$result5 = mysqli_query($db,$query);
$row5 = mysqli_fetch_array($result5);
$query = "SELECT total, grade FROM result WHERE course= 'CSMD05' ";
$result6 = mysqli_query($db,$query);
$row6 = mysqli_fetch_array($result6);

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
<div id="main"> <a href="courseregistration.php"><< Back</a>
<table width="80%" border="0" align="center" cellpadding="3" cellspacing="3">
    <tr>
        <td width="23%" align="left" valign="top" bgcolor=""><ul>
            <li><a href="courseform.php">My Course Form</a></li>
            <li><a href="index.php">Log Out</a></li>
        </ul></td>
        <td width="80%" align="left" valign="top"><table width="80%"  align="center" cellpadding="3" cellspacing="3" border="1">
            <tr>
                <th colspan="6" align="center">STUDENT SESSIONAL RESULT</th>

            </tr>  <tr><table width="80%" border="1" align="center" cellpadding="3" cellspacing="3">
            <tr>
                <td width="20%">Student Number :</td>
                <td width="60%"> <?php echo $row['regno'];?></td>
                 <td width="20%"rowspan="4"><?php echo "<img src='img/".$row['image']."' "; ?></td>
            </tr>
            <tr>
                <td>Student Name : </td>
                <td> <?php echo $row['name'];?></td>
            </tr>
            <tr>
                <td>Program:  </td>
                <td> <?php echo $row['program'];?></td>

            </tr>
                        <tr>
                            <td> Session : </td>
                            <td><h3><?php echo $row['session'];?></h3></td>
                        </tr>
        </table>
                    <form action="courseform.php">
            <table width="80%"  align="center" cellpadding="3" cellspacing="3" border="1"> </tr>

                <tr>
                    <td width="10%">S/NO</td>
                    <td >CODE</td>
                    <td>TOTAL </td>
                    <td>GRADE</td>

                </tr>
                <tr>
                    <td width="10%">1</td>
                    <td>CSMD01 </td>
                    <td><?php echo $row2['total']; ?></td>
                    <td><?php echo $row2['grade']; ?></td>

                </tr>
                <tr>
                    <td width="10%">2</td>
                    <td>CSMD02</td>
                    <td><?php echo $row3['total']; ?></td>
                    <td><?php echo $row3['grade']; ?></td>

                </tr>
                <tr>
                    <td width="10%">3</td>
                    <td>CSMD03</td>
                    <td><?php echo $row4['total']; ?></td>
                    <td><?php echo $row4['grade']; ?></td>

                </tr>
                <tr>
                    <td width="10%">4</td>
                    <td>CSMD04</td>
                    <td><?php echo $row5['total']; ?></td>
                    <td><?php echo $row5['grade']; ?></td>

                </tr>
                <tr>
                    <td width="10%">5</td>
                    <td>CSMD05</td>
                    <td><?php echo $row6['total']; ?></td>
                    <td><?php echo $row6['grade']; ?></td>
                </tr>
            </table>
                    </form>
                </table>
</div>
<div id="footer">&copy;2018, MKAINUWA</div>
</body>
</html>