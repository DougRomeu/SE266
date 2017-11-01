<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/1/2017
 * Time: 1:41 PM
 */
function getCorpsAsTable($db, $corps=NULL, $cols=NULL, $sortable=false, $dir=NULL)
{
    if(!$sortable) {
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
            die("there was a problem retrieving corps err:1");
        }
    }
        else{
            try {
                $sql = $db->prepare("SELECT * FROM `corps` ORDER BY '$cols' '$dir'");
                $sql->execute();
                //$corps = $sql->fetchAll(PDO::FETCH_ASSOC);
                if ($sql->rowCount() > 0) {
                    $table = "<table>" . PHP_EOL;
                    $table .= "<tr><th>$cols</th>";
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
                } else {
                    $table = "No corps to report.";
                }
                return $table;
            } catch (PDOException $e) {
                die("there was a problem retrieving corps err:2");
            }
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

function getSearchResults($db, $col, $terms)
{
    try {
        $sql = $db->prepare("SELECT * FROM corps WHERE $col LIKE '$terms%'");
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
            $table .= "<a href=\"index.php\">Home</a>";

        } else {
            $table = "Nothing to report.";
            $table .= "<br /><a href=\"index.php\">Home</a>";
        }
        return $table;
    } catch (PDOException $e) {
        die("There was a problem reading data.");
    }
}