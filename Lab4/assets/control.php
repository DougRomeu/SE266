<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/1/2017
 * Time: 1:46 PM
 */

require_once ("assets/dbconn.php");
$db = dbconn();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? "";

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? NULL;

$col = filter_input(INPUT_GET, 'col', FILTER_SANITIZE_STRING) ?? NULL;
$dir = filter_input(INPUT_GET, 'dir', FILTER_SANITIZE_STRING) ?? NULL;

$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
//$incorp_dt = filter_input(INPUT_POST, 'incorp_dt', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
switch ($action){
    case "Add":
        addCorp($db, $corp, $email, $zipcode, $owner, $phone);
        break;
    case "Update":
        echo updateCorp($db, $corp, $zipcode, $email, $owner, $phone, $id);
        header("Refresh:0");
        break;
    case "sort":
        $sortable = true;
        $employees = getCorpsAsSortedTable($db, $col, $dir);
        $cols = getColumnNames($db, 'employees');
        echo getEmployeesAsTable($db, $employees, $cols, $sortable);
        break;
}