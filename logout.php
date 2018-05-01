<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 17/04/2018
 * Time: 01:02
 */
session_start();
session_destroy();
header("location: index.php");
exit();
