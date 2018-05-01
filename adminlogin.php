<?php include ('login2.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="index.css" media="all" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="header">
    <h1 align="center">ADMIN LOGIN</h1>
</div>
<div id="main">		<div id="slipList">
    <?php if(isset($_GET['msg'])&&!empty($_GET['msg']))
        {
            echo "<h4 style='color: red'>Invalid login details</h4>";
    }

    ?>
    <?php if(isset($_GET['msg2'])&&!empty($_GET['msg2']))
        {
            echo "<h4 style='color: red'>All fields are required!</h4>";
    }

    ?>
    <h2>Admin</h2>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" maxlength="30">
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" maxlength="30">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Login" >
                </td>
            </tr>
        </table>
        <br><br>
    </form>

</div>
</div>
<div id="footer">&copy; 2018, MKAINUWA</div>
</body>
</html>