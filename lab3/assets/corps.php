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
                $table .= "</td><td><a href='read.php' id='$corp[id]'>Read</a>";
                $table .= "</td><td><a href='update.php' id='$corp[id]'>Update</a>";
                $table .= "</td><td><a href='delete.php' id='$corp[id]'>Delete</a>";
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