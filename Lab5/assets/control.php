<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/1/2017
 * Time: 1:46 PM
 */

require_once ("dbconn.php");
include_once ("sites.php");

$db = getDB();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? NULL;
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? NULL;
$site = filter_input(INPUT_POST, 'site', FILTER_VALIDATE_URL) ?? filter_input(INPUT_POST, 'site', FILTER_VALIDATE_URL) ?? NULL;

$valid = false;

switch ($action){
    case "Add":
        $valid = validateSite($db, $site);
        if($site != NULL && $valid == true){
            //is valid
            echo "Is Valid";
            addSite($db, $site);
        }else{
            //is not valid
            echo "Is Not Valid";
        }
        break;
    case "Reset":
        break;
    case "View":
        break;

}