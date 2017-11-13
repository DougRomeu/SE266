<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/1/2017
 * Time: 1:46 PM
 */

require_once ("dbconn.php");

$db = dbconn();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? "";

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? NULL;

$site = filter_input(INPUT_POST, 'site', FILTER_VALIDATE_URL) ?? NULL;
switch ($action){
    case "Add":
        $valid = validateSite($db, $site);
        if(!$valid){
            echo ("BAD");
        }
        else{
            echo ("GOOD");
        }
        break;
    case "Reset":
        break;
    case "View":
        break;

}