<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/6/2017
 * Time: 11:36 AM
 */
/*     /^[0-9]{5}$/ US zip code   -> for zip +4 use 2 dialog boxs [_5_] - [_4_]   -> /^([0-9]{5})(-[0-9]{4})?$/

        phone number ->  [_3_] - [_3_] - [_4_]
 */
session_start(); //every page that needs session variables needs this line
if ($_SESSION['username'] == NULL | !isset($_SESSION['username'])){
    header('Location: foo2.php'); //<- if not logged in, send them to log in page. Do not have any html data before this line.
}


$file = file_get_contents("https://www.cnn.com");
echo preg_match_all('/Trump/', $file, $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
//$greps = preg_grep('/Trump/', $file); --> split string into an array

//grabbing a primary key for a foreign key reference
$db = getMyDatabase();
$sql = "INSERT INTO foo VALUES (null, 'Clark', 'Alexander')";
$stmt = $db->prepare($sql);
//bind params as necessary
$stmt->execute();
$pk = $db->lastInsertedId(); // will get the last primary key inserted


$pw = "foo";
$hash = password_hash($pw, PASSWORD_DEFAULT);
echo "<p>" . $hash . "</p>";
echo strlen($hash);

//Pretend hash came from the database
$login_pwd = "foo";
echo password_verify($login_pwd, $hash);

//$pw = "foo";
//echo password_hash($pw, PASSWORD_DEFAULT) . "</p>";
//$pw = "foo34536dtj57j657j";
//echo password_hash($pw, PASSWORD_DEFAULT) . "</p>";
