<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/29/2017
 * Time: 6:23 PM
 * @param $db
 * @param $email
 * @param $password
 * @param $password2
 * @return bool
 */

function validateUser($db, $email, $password, $password2){
    try{
        $sql = $db->prepare("SELECT * FROM users WHERE email=:email");
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->bindParam(':password', $password, PDO::PARAM_STR);
        $sql->bindParam(':password2', $password2, PDO::PARAM_STR);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            echo("Email already in use");
            $valid = false;
        }
        else {
            if($password == $password2) {
                $valid = true;
            }
            else{
                echo("Passwords don't match");
                $valid = false;
            }
        }
        return $valid;
    }
    catch (PDOException $e){
        die("There was a problem validating user.");
    }
}

function validateEmail($db, $email){
    $sql = $db->prepare("SELECT * FROM users WHERE email=:email");
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->execute();
    if ($sql->rowCount() > 0) {
        $valid = false;
        echo('email already exists');
    }
    else {
        $valid = true;
    }
    return $valid;
}
function validatePassword($password, $password2){
    if($password != null && $password == $password2){
        $valid = true;
    }
    else{
        $valid = false;
    }
    return $valid;
}



function addUser($db, $email, $password){
    try{
        $sql = $db->prepare("INSERT INTO users (email, password, created) VALUES (:email, :password, NOW())");
        $sql->bindParam(':email', $email);
        $sql->bindParam(':password', $password);
        $sql->execute();
        echo ("<h2>Successfully Added New User :)</h2>");
        return $sql->rowCount();
    }
    catch (PDOException $e){
        die("There was a problem adding user to the data base.");
    }
}

function logUser($db, $email, $password){
    $sql = $db->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->bindParam(':password', $password, PDO::PARAM_STR);
    $sql->execute();
    if ($sql->rowCount() > 0) {
        $valid = true;
        echo('VALID');
    }
    else {
        $valid = false;
        echo('Email or Password is incorrect');
    }
    return $valid;


}