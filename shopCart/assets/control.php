<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/29/2017
 * Time: 6:17 PM
 */

require_once ("dbconn.php");
include_once ("users.php");

$db = dbconn();

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ?? "";
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING) ?? "";
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING) ?? "";
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? NULL;

$valid = false;

$hash = password_hash($password, PASSWORD_DEFAULT);
//$hashed = password_verify($password, $hash);

switch ($action){
    case "Login":
        $hashed = password_verify($password, $hash);
        $validUser = logUser($db, $email, $hashed);
        if($validUser == true){
            //$_SESSION['username'] == $email;
        }
        break;
    case "Register":
        $validEmail = validateEmail($db, $email);
        if($email != NULL && $validEmail == true){
            //is valid
            echo "Email Is Valid / ";
            $validPassword = validatePassword($password, $password2);
            if($password != NULL && $validPassword == true){
                //is valid
                echo " Password Is Valid";
                addUser($db, $email, $hash);
            }else{
                //is not valid
                echo "Passwords must match and cannot be blank";
            }
        }else{
            //is not valid
            echo "Email Not Valid or Already Exists";
        }
}