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

            $regno =   $_POST['regno'];
            $program = $_POST['program'];
            $session = $_POST['session'];
            $csmd01 = $_POST['CSMD01'];
            $csmd02 = $_POST['CSMD02'];
            $csmd03 = $_POST['CSMD03'];
            $csmd04 = $_POST['CSMD04'];
            $csmd05 = $_POST['CSMD05'];
            $total1 = $_POST['total1'];
            $total2 = $_POST['total2'];
            $total3 = $_POST['total3'];
            $total4 = $_POST['total4'];
            $total5 = $_POST['total5'];
            $option1 = $_POST['option1'];
            $option2 = $_POST['option2'];
            $option3 = $_POST['option3'];
            $option4 = $_POST['option4'];
            $option5 = $_POST['option5'];

            if (!empty($_POST['regno']) || !empty($_POST['program']) || !empty($_POST['session']) || !empty($_POST['total1']) || !empty($_POST['total2']) || !empty($_POST['total3']) || !empty($_POST['total4']) || !empty($_POST['total5']) || !empty($_POST['option1']) || !empty($_POST['option2']) || !empty($_POST['option3']) || !empty($_POST['option4']) || !empty($_POST['option5'])) {


                $sql = "INSERT INTO result (regno, program, session, course, total, grade) VALUES ('$regno', '$program','$session','$csmd01','$total1','$option1');";

                $sql .= "INSERT INTO result (regno, program, session, course, total, grade) VALUES ('$regno', '$program','$session','$csmd02','$total2','$option2');";

                $sql .= "INSERT INTO result (regno, program, session, course, total, grade) VALUES ('$regno', '$program','$session','$csmd03','$total3','$option3');";

                $sql .=  "INSERT INTO result (regno, program, session, course, total, grade) VALUES ('$regno', '$program','$session','$csmd04','$total4','$option4');";

                $sql .= "INSERT INTO result (regno, program, session, course, total, grade) VALUES ('$regno', '$program','$session','$csmd05','$total5','$option5')";

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
    <h1 align="center">UPLOAD RESULT</h1>
</div>
<div id="main"> <a href="adminpage.php"><< Back</a>


    <form action="" method="POST">
        <table align="center" border="0">
            <tr>
                <td>Student Number:</td>
                <td><input type="text" name="regno" size="29"  maxlength="11"></td>
            </tr>
            <tr>
                <td>Program:</td>
                <td><select name="program">
                    <option value="" name="program">- - select - -</option><option value='CSMD01'>Internet System Development</option><option value='CSMD02'>Data Visualization</option><option value='CSMD03'>General Engineering</option><option value='CSMD04'>Data Management</option><option value='CSMD05'>Collaborative IT</option>        </select>
                </td>
            </tr>
            <tr>
                <td>Session:</td>
                <td><select name="session">
                    <option value="" name="session">- - select - -</option><option value='2018/2019'>2018/2019</option>              </select>
                </td>
            </tr>

        </table>
        </table>
        <table width="27%"  align="center" cellpadding="3" cellspacing="3" border="1"> </tr>

            <tr>
                <td width="3%">S/NO</td>
                <td >CODE</td>
                <td>TOTAL </td>
                <td>GRADE</td>

            </tr>
            <tr>
                <td width="3%">1</td>
                <td><input type="hidden" name="CSMD01" value="CSMD01">CSMD01 </td>
                <td><input type="text" size="15" maxlength="3" name="total1"></td>
                <td><select name="option1">
                        <option value="" name="option1">- - select - -</option><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option><option value='E'>E</option><option value='F'>F</option>         </select>
                </td>

            </tr>
            <tr>
                <td width="3%">2</td>
                <td><input type="hidden" name="CSMD02" value="CSMD02">CSMD02</td>
                <td><input type="text" size="15" maxlength="3" name="total2"></td>
                <td><select name="option2">
                    <option value="" name="option2">- - select - -</option><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option><option value='E'>E</option><option value='F'>F</option>         </select>
                </td>
            </tr>
            <tr>
                <td width="3%">3</td>
                <td><input type="hidden" name="CSMD03" value="CSMD03">CSMD03</td>
                <td><input type="text" size="15" maxlength="3" name="total3"></td>
                <td><select name="option3">
                    <option value="" name="option3">- - select - -</option><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option><option value='E'>E</option><option value='F'>F</option>         </select>
                </td>
            </tr>
            <tr>
                <td width="3">4</td>
                <td><input type="hidden" name="CSMD04" value="CSMD04">CSMD04</td>
                <td><input type="text" size="15" maxlength="3" name="total4"></td>
                <td><select name="option4">
                    <option value="" name="option4">- - select - -</option><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option><option value='E'>E</option><option value='F'>F</option>         </select>
                </td>
            </tr>
            <tr>
                <td width="3%">5</td>
                <td><input type="hidden" name="CSMD05" value="CSMD05">CSMD05</td>
                <td><input type="text" size="15" maxlength="3" name="total5"></td>
                <td><select name="option5">
                    <option value="" name="option5">- - select - -</option><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option><option value='E'>E</option><option value='F'>F</option>         </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Add Grade"></td>
            </tr>
        </table>
    </form>
</div>
<div id="footer">&copy; 2018, MKAINUWA</div>
</body>
</html>