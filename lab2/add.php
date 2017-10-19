<h1>Add Form</h1>
<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 10/18/2017
 * Time: 1:59 PM
 */

require_once ("assets/dbconn.php");

include_once ("assets/header.php");
include_once ("assets/actors.php");
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

include_once ("assets/addForm.php");

include_once ("assets/footer.php");