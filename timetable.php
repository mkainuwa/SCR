<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'scr_database');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit'])) {

    $csmd01 = $_POST['CSMD01'];
    $csmd02 = $_POST['CSMD02'];
    $csmd03 = $_POST['CSMD03'];
    $csmd04 = $_POST['CSMD04'];
    $csmd05 = $_POST['CSMD05'];
    $time1  = $_POST['time1'];
    $time2  = $_POST['time2'];
    $time3  = $_POST['time3'];
    $time4  = $_POST['time4'];
    $time5  = $_POST['time5'];
    $date1  = $_POST['date1'];
    $date2  = $_POST['date2'];
    $date3  = $_POST['date3'];
    $date4  = $_POST['date4'];
    $date5  = $_POST['date5'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $option5 = $_POST['option5'];

    if (!empty($_POST['time1']) || !empty($_POST['time2']) || !empty($_POST['time3']) || !empty($_POST['time4']) || !empty($_POST['time5']) || !empty($_POST['date1']) || !empty($_POST['date2']) || !empty($_POST['date3']) || !empty($_POST['date4']) || !empty($_POST['date5'])|| !empty($_POST['option1'])|| !empty($_POST['option2'])|| !empty($_POST['option3']) || !empty($_POST['option4']) ||!empty($_POST['option5'])) {


        $sql = "INSERT INTO timetable (course, time, date, venue) VALUES ('$csmd01','$time1','$date1','$option1');";

        $sql .= "INSERT INTO timetable (course, time, date, venue) VALUES ('$csmd02','$time2','$date2','$option2');";

        $sql .= "INSERT INTO timetable (course, time, date, venue)  VALUES ('$csmd03','$time3','$date3','$option3');";

        $sql .=  "INSERT INTO timetable (course, time, date, venue) VALUES ('$csmd04','$time4','$date4','$option4');";

        $sql .= "INSERT INTO timetable (course, time, date, venue)  VALUES ('$csmd05','$time5','$date5','$option5')";
        $result = mysqli_multi_query($db, $sql);

        if ($result == TRUE) {

            echo "Grades added successfully!";
            header("location: uploadresult.php");
        } else {
            echo mysqli_error($db);
        }
    } else {

        echo mysqli_error($db);

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="index.css" media="all" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="header">
    <h1 align="center">EXAMINATION TIMETABLE</h1>
</div>
<div id="main"> <a href="adminpage.php"><< Back</a>
    <br>
    <br>
<form action="" method="POST">
    <table width="60%" align="center" cellpadding="3" cellspacing="3" border="1"> </tr>

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
            <td><input type="hidden" name="CSMD01" value="CSMD01">CSDM01</td>
            <td>INTERNET SYSTEM DEVELOPMENT</td>
            <td><input type="time" size="15" maxlength="15" name="time1"></td>
            <td><input type="date" size="15" maxlength="10" name="date1"></td>
            <td><select name="option1">
                <option value="">- - select - -</option><option value='MK11'>MK11</option><option value='D211'>D211</option><option value='SM011'>SM011</option><option value='AR37'>AR37</option><option value='AB11'>AB11</option><option value='CG024'>CG024</option>         </select>
            </td>


        </tr>
        <tr>
            <td width="10%">2</td>
            <td><input type="hidden" name="CSMD02" value="CSMD02">CSDM02</td>
            <td>DATA VISUALISATION</td>
            <td><input type="time" size="15" maxlength="15" name="time2"></td>
            <td><input type="date" size="15" maxlength="10" name="date2"></td>
            <td><select name="option2">
                <option value="">- - select - -</option><option value='MK11'>MK11</option><option value='D211'>D211</option><option value='SM011'>SM011</option><option value='AR37'>AR37</option><option value='AB11'>AB11</option><option value='CG024'>CG024</option>         </select>
            </td>


        </tr>
        <tr>
            <td width="10%">3</td>
            <td><input type="hidden" name="CSMD03" value="CSMD03">CSDM03</td>
            <td>GENERAL ENGINEERING</td>
            <td><input type="time" size="15" maxlength="15" name="time3"></td>
            <td><input type="date" size="15" maxlength="10" name="date3"></td>
            <td><select name="option3">
                <option value="">- - select - -</option><option value='MK11'>MK11</option><option value='D211'>D211</option><option value='SM011'>SM011</option><option value='AR37'>AR37</option><option value='AB11'>AB11</option><option value='CG024'>CG024</option>         </select>
            </td>


        </tr>
        <tr>
            <td width="10%">4</td>
            <td><input type="hidden" name="CSMD04" value="CSMD04">CSDM04</td>
            <td>DATA MANAGEMENT</td>
            <td><input type="time" size="15" maxlength="15" name="time4"></td>
            <td><input type="date" size="15" maxlength="10" name="date4"></td>
            <td><select name="option4">
                <option value="">- - select - -</option><option value='MK11'>MK11</option><option value='D211'>D211</option><option value='SM011'>SM011</option><option value='AR37'>AR37</option><option value='AB11'>AB11</option><option value='CG024'>CG024</option>         </select>
            </td>


        </tr>
        <tr>
            <td width="10%">5</td>
            <td><input type="hidden" name="CSMD05" value="CSMD05">CSDM05</td>
            <td>COLLABORATIVE IT</td>
            <td><input type="time" size="15" maxlength="15" name="time5"></td>
            <td><input type="date" size="15" maxlength="10" name="date5"></td>
            <td><select name="option5">
                <option value="">- - select - -</option><option value='MK11'>MK11</option><option value='D211'>D211</option><option value='SM011'>SM011</option><option value='AR37'>AR37</option><option value='AB11'>AB11</option><option value='CG024'>CG024</option>         </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="4"><input type="submit" name="submit" value="Submit"/></td>

        </tr>

    </table>
</form>
</div>
<div id="footer">&copy 2018, MKAINUWA</div>
</body>
</html>