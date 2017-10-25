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
                $table .= "</td><td><a href='read.php?id=" . $corp['id'] . "'>Read</a>";
                $table .= "</td><td><a href='update.php?id=" . $corp['id'] . "'>Update</a>";
                $table .= "</td><td><a href='delete.php?id=" . $corp['id'] . "'>Delete</a>";
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

function addCorp($db, $corp, $zipcode, $email, $owner, $phone){
    try{
        $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, NOW(), :zipcode, :email, :owner, :phone)");
        $sql->bindParam(':corp', $corp);
        //$sql->bindParam(':incorp_dt', $incorp_dt);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        echo ("<h2>Successfully Added Corp.</h2>");
        return $sql->rowCount();
    }
    catch (PDOException $e){
        die("There was a problem entering data.");
    }
}

function readCorp($db){
    try{
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ??
            filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? "";
        $sql = $db->prepare("SELECT * FROM corps WHERE id=:id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            $table .= "<tr><th>Company Name</th><th>incorp_dt</th><th>Email</th><th>Zip Code</th><th>Owner</th><th>Phone</th>";
            foreach ($corps as $corp) {
                $table .= "<tr><td>" . $corp['corp'];
                $table .= "<td>" . $corp['incorp_dt'];
                $table .= "</td><td>" . $corp['email'];
                $table .= "</td><td>" . $corp['zipcode'];
                $table .= "</td><td>" . $corp['owner'];
                $table .= "</td><td>" . $corp['phone'];
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
            $table .= "<a href=\"index.php\">Home</a>|";
            $table .= "<a href='update.php?id=" . $corp['id'] . "'>Update</a>|";
            $table .= "<a href='delete.php?id=" . $corp['id'] . "'>Delete</a>";

        }
        else{
            $table = "Nothing to report.";
            $table .= "<br /><a href=\"index.php\">Home</a>";
        }
        return $table;
    } catch (PDOException $e){
        die("There was a problem reading data.");
    }
}

function updateForm($db, $id){
    try {
        $sql = $db->prepare("SELECT * FROM corps WHERE id=:id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $form = "<form method='post' action='#'>" . PHP_EOL;
            foreach ($corps as $corp) {
                $form .= "Corp:</br><input type='text' name='corp' id='corp' value='" . $corp['corp'] . "'/><br />";
                $form .= "Email:</br><input type='text' name='email' id='corp' value='" . $corp['email'] . "'/><br />";
                $form .= "Zip:</br><input type='text' name='zipcode' id='corp' value='" . $corp['zipcode'] . "'/><br />";
                $form .= "Owner:</br><input type='text' name='owner' id='corp' value='" . $corp['owner'] . "'/><br />";
                $form .= "Phone:</br><input type='text' name='phone' id='corp' value='" . $corp['phone'] . "'/><br />";
                $form .= "<input type='submit' name='action' value='Update'/>";
                $form .= "<br /><a href=\"index.php\">Home</a>|";
                $form .= "<a href='delete.php?id=" . $corp['id'] . "'>Delete</a>";
            }
        } else {
            echo ($id);
            $form = "nothing to see here";
            $form .= "<br /><a href=\"index.php\">Home</a>";
        }
        return $form;
    }catch(PDOException $e){
        die("There was a problem grabbing the data");
    }
}

function updateCorp($db, $corp, $zipcode, $email, $owner, $phone, $id){
    try{
        $sql = $db->prepare("UPDATE corps SET corp= :corp,zipcode= :zipcode,email= :email,owner= :owner,phone= :phone WHERE id=:id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':corp', $corp);
        //$sql->bindParam(':incorp_dt', $incorp_dt);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        $p = "<br /><p>Update Success</p>";
    }
    catch (PDOException $e){
        die("There was a problem entering data.");
    }
    return $p;
}

function deleteCorp($db){
    try{
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ??
            filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? "";
        $sql = $db->prepare("DELETE FROM corps WHERE id=:id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $p = "<br /><p>Delete Success</p>";
    } catch (PDOException $e){
        die("There was a problem deleting data.");
    }
    return $p;
}