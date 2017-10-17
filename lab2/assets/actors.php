<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 10/17/2017
 * Time: 3:17 PM
 */
function getActorsAsTable($db)
{
    try {
        $sql = $db->prepare("SELECT * FROM actors");
        $sql->execute();
        $actors = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            foreach ($actors as $actor) {
                $table .= "<tr><td> |FIRST NAME : " . $actor['firstname'];
                $table .= "</td><td> |LAST NAME : " . $actor['lastname'];
                $table .= "</td><td> |DATE OF BIRTH : " . $actor['dob'];
                $table .= "</td><td> |HEIGHT : " . $actor['height'];

                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "No actors to report.";
        }
        return $table;
    } catch (PDOException $e) {
        die("there was a problem retrieving actors");
    }
}

function addActor($db, $firstname, $lastname, $dob, $height){
    try{
        $sql = $db->prepare("INSERT INTO actors VALUES (null, :firstname, :lastname, :dob, :height)");
        $sql->bindParam(':firstname', $firstname);
        $sql->bindParam(':lastname', $lastname);
        $sql->bindParam(':dob', $dob);
        $sql->bindParam(':height', $height);
        $sql->execute();
        return $sql->rowCount();
    }
    catch (PDOException $e){
        die("There was a problem entering data.");
    }
}