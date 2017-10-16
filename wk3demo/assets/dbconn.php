<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 10/16/2017
 * Time: 12:08 PM
 */
function dbconn(){
    $dsn = "mysql:host=localhost;dbname=dogs";
    $username = "dogs";
    $password = "se266";

    try{
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch (PDOException $e){
        die("Unexpected Error 349: Database connection issue. Please contact your database administrator.");
    }
}
