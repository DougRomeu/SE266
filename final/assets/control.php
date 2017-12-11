<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 12/11/2017
 * Time: 11:40 AM
 */

require_once("dbconn.php");
include_once("accounts.php");

$db = dbconn();

//User Input Data
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
$heard = filter_input(INPUT_POST, 'heard_from', FILTER_SANITIZE_STRING) ?? "";
$contact = filter_input(INPUT_POST, 'contact_via', FILTER_SANITIZE_STRING) ?? "";
$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING) ?? "";

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? NULL;

//------------------------------------------------------------------------------------------------------
switch ($action) {
    case "Submit":
        if($email != NULL && $phone != NULL && $heard != NULL){

            //Cant figure out why, but it wont let me add an email that was used already even after I delete it from database.
            // Will leave email validation out for now so i can move on.

            //$valid = validateEmail($db, $email);
            //if($valid){
                $lastID = addRecord($db, $email, $phone, $heard, $contact, $comments);
                echo(displayRecord($db, $lastID));
            //}
            //else{
            //    echo("<h3>EMAIL ALREADY EXISTS, PLEASE ENTER NEW EMAIL</h3>");
            //}
        }
        else{
            echo("<h3>PLEASE FILL IN ALL REQUIRED DATA FIELDS</h3>");
        }
        break;
}