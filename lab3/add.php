<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 10/23/2017
 * Time: 12:22 PM
 */

require_once ("assets/dbconn.php");


include_once ("assets/corps.php");
$db = dbconn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$incorp_dt = filter_input(INPUT_POST, 'incorp_dt', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
switch ($action){
    case "Add":
        addCorp($db, $corp, $incorp_dt, $email, $zipcode, $owner, $phone);
        break;
}

include_once ("assets/form.php");

