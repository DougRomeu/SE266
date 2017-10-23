<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 10/23/2017
 * Time: 12:01 PM
 */
function getCorpsAsTable($db)
{
    try {
        $sql = $db->prepare("SELECT * FROM corps");
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            $table .= "<tr><th>Company Name</th>";
            foreach ($corps as $corp) {
                $table .= "<tr><td>" . $corp['corp'];
                $table .= "</td><td><a href='read.php?id=$corp[id]' name='action'>Read</a>";
                $table .= "</td><td><a href='update.php?id=$corp[id]' name='action'>Update</a>";
                $table .= "</td><td><a href='delete.php?id=$corp[id]' name='action'>Delete</a>";
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "No corps to report.";
        }
        return $table;
    } catch (PDOException $e) {
        die("there was a problem retrieving corps");
    }
}

function addCorp($db, $corp, $incorp_dt, $zipcode, $email, $owner, $phone){
    try{
        $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, :incorp_dt, :zipcode, :email, :owner, :phone)");
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':incorp_dt', $incorp_dt);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        return $sql->rowCount();
    }
    catch (PDOException $e){
        die("There was a problem entering data.");
    }
}

function readCorp($db){
    try{
        $id = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        $sql = $db->prepare("SELECT * FROM corps WHERE id=:$id");
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            $table .= "<tr><th>Company Name</th>";
            $table .= "<tr><td>" . $corps['corp'];

            $table .= "</td></tr>";
            $table .= "</table>" . PHP_EOL;
        }
        else{
            $table = "Nothing to report.";
        }
        return $table;
    } catch (PDOException $e){
        die("There was a problem reading data.");
    }
}