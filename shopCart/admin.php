<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/30/2017
 * Time: 12:42 PM
 */

session_start(); //every page that needs session variables needs this line
if ($_SESSION['username'] == NULL | !isset($_SESSION['username'])){
    header('Location: login.php'); //<- if not logged in, send them to log in page. Do not have any html data before this line.
}

