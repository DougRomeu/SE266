<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 10/11/2017
 * Time: 1:21 PM
 *
 * This is a really bad example of code. Just meant to get the basics across.
 */

$dsn = "mysql:host=localhost;dbname=dogs";
$username = "dogs";
$password = "se266";

try{
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    die("Unexpected Error 349: Database connection issue. Please contact your database administrator.");
}
/* 1 way to do it.
if(isset($_POST['submit']) ){
    $submit = $_POST['submit'];
}
else{
    $submit = "";
}
*/
/* Another way to do it.
$submit = isset($_POST['submit']) ? $_POST['submit'] : ""; //ternary
*/
// Yet another way to do it.
$submit = $_POST['submit'] ?? ""; //null colesence operator
if ($submit == "Submit"){
    $name = $_POST['name'] ?? "";
    $gender = $_POST['gender'] ?? "F";
    $fixed = $_POST['fixed']?? false;
    try {
        $sql = $db->prepare("INSERT INTO animals VALUES (null, :name, :gender, :fixed)");

        $sql->bindParam(':name', $name);
        $sql->bindParam(':gender', $gender);
        $sql->bindParam(':fixed', $fixed);
        $sql->execute();
        echo $sql->rowCount() . "rows inserted.";
    }
    catch(PDOException $e) {
        $e->getMessage();
    }
}
?>

<form method="post" action="#">

    Name: <input type="text" name="name"/><br />

    Gender:
    M<input type="radio" name="gender" value="M"/>
    F<input type="radio" name="gender" value="F"/><br />

    Fixed: <input type="checkbox" name="fixed" value="true" /><br />

    <input type="submit" name="submit" value="Submit"/>

</form>