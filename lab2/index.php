<?php
require_once ("assets/dbconn.php");
require_once ("assets/actors.php");

include_once ("assets/header.php");
$db = dbconn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING) ?? "";
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING) ?? "";
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING) ?? "";
$height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_STRING) ?? "";

switch ($action){
    case "Add":
        //if (strlen($firstname) >= 1 && strlen($lastname) >= 1 && strlen($dob) >= 1 && strlen($height) >= 1)
        //{
            addActor($db, $firstname, $lastname, $dob, $height);
        //}
        break;
}
echo (getActorsAsTable($db));


include_once ("assets/addForm.php");
include_once ("assets/footer.php");
