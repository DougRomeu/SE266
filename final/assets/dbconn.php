<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 10/17/2017
 * Time: 3:06 PM
 */
function dbconn(){
    $dsn = "mysql:host=localhost;dbname=phpclassfall2017";
    $username = "PHPClassFall2017";
    $password = "SE266";

    try{
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch (PDOException $e){
        die("Database connection issue. Please contact your database administrator.");
    }
}
