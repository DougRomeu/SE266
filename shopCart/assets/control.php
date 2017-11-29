<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/29/2017
 * Time: 6:17 PM
 */

require_once ("dbconn.php");
include_once ("sites.php");
include_once ("sitesView.php");

$db = dbconn();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING) ?? "";
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING) ?? "";


switch ($action){
    case "Login":

        break;
    case "Register":

        break;
}