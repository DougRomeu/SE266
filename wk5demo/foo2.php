<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/6/2017
 * Time: 2:09 PM
 */
session_start();
$_SESSION['username'] = "Clark";
header('Location: foo.php');