<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 10/16/2017
 * Time: 12:15 PM
 */
function getDogsAsTable($db){
    try {
        $sql = $db->prepare("SELECT * FROM animals");
        $sql->execute();
        $dogs = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() >0){
            $table = "<table>" . PHP_EOL;
            foreach($dogs as $dog) {
                $table .= "<tr><td> |NAME : " . $dog['name'];
                $table .= "</td><td> |GENDER : " . $dog['gender'];
                if($dog['fixed'] == 0)
                {
                    $table .= "</td><td> |STATUS : " . "Fixed";
                }
                else{
                    $table .= "</td><td> |STATUS : " . "Not Fixed";
                }

                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        }
        else{
            $table= "Life is sad. There are no dogs.";
        }
        return $table;
    }
    catch (PDOException $e){
        die("there was a problem retrieving dogs");
    }

    /*if (count($results)){
        foreach ($results as $dog){
            print_r($dog);
        }
    }*/
}

function addDog($db, $name, $gender, $fixed){
    try{
         $sql = $db->prepare("INSERT INTO animals VALUES (null, :name, :gender, :fixed)");
         $sql->bindParam(':name', $name);
         $sql->bindParam(':gender', $gender);
         $sql->bindParam(':fixed', $fixed);
         $sql->execute();
         return $sql->rowCount();
    }
    catch (PDOException $e){
        die("There was a problem giving birth to the puppy.");
    }
}