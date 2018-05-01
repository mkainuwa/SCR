<?php
session_start();
include ('dbconnect.php');
if (!$_SESSION['regno']){
    $_SESSION['nsg'] = "You must log in first";
    header("location: index.php");
}
$query = "SELECT id,name, regno FROM login WHERE regno = '".$_SESSION['regno']."'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$id = $row['id'];
$name = $row['name'];
$reg = $row['regno'];
;?>
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
<div id="main"> <a href="courseregistration.php"><< Back</a>

    <h2>Student Information  Form </h2>

    <form action="courseform.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <table align="center" border="1">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" size="39"  maxlength="60" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>Reg. Number:</td>
                <td><input type="text" name="regno" size="39"  maxlength="11" value="<?php echo $reg;?>"</td>
            </tr>
            <tr>
                <td>Program:</td>
                <td><select name="program">
                    <option value="">- - select - -</option><option value='Internet System Development'>Internet System Development</option><option value='Data Visualization'>Data Visualization</option><option value='General Engineering'>General Engineering</option><option value='Data Management'>Data Management</option><option value='Collaborative IT'>Collaborative IT</option>        </select>
                </td>
            </tr>
            <tr>
                <td>Session:</td>
                <td><select name="session">
                    <option value="">- - select - -</option><option value='2018/2019'>2018/2019</option>               </select>
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="text" name="dob" size="39" value="" maxlength="10"></td>
            </tr>
            <tr>
                <td>Sex:</td>
                <td><select name="sex">
                    <option value="">- - select - -</option><option value='Male'>Male</option><option value='Female'>Female</option>                </select>
                </td>
            </tr>
            <tr>
                <td>Marital Status:</td>
                <td><select name="maritalstatus">
                    <option value="">- - select - -</option><option value='Single'>Single</option><option value='Married'>Married</option>                </select>
                </td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><input type="text" name="email" size="39" value="" maxlength=""></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><input type="text" name="phonenum" size="39" value="" maxlength="11"></td>
            </tr>
            <tr>
                <td>Permanent Home Address:</td>
                <td><input type="text" name="pha" size="39" value="" maxlength="80" onBlur="document.newusers.reg_num.value=document.newusers.reg_num.value.toUpperCase()"></td>
            </tr>
            <tr>
                <td>Contact Address:</td>
                <td><input type="text" name="address" size="39" value="" maxlength="80"></td>
            </tr>
            <tr>

                <td>Upload Image:</td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</div>
<div id="footer">&copy; 2018, MKAINUWA</div>
</body>
</html>