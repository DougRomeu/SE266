<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 12/11/2017
 * Time: 12:01 PM
 */

function addRecord($db, $email, $phone, $heard, $contact, $comments){
    try{
        $sql = $db->prepare("INSERT INTO account (id, email, phone, heard, contact, comments) VALUES (NULL, :email, :phone, :heard, :contact, :comments)");
        $sql->bindParam(':email', $email);
        $sql->bindParam(':phone', $phone);
        $sql->bindParam(':heard', $heard);
        $sql->bindParam(':contact', $contact);
        $sql->bindParam(':comments', $comments);
        $sql->execute();

        $lastID = $db->lastInsertId();

        echo ("<h3>Successfully Added New Account :)</h3>");
        return $lastID;
    }
    catch (PDOException $e){
        die("There was a problem adding accounts to the data base. Please contact database administrator");
    }
}

function validateEmail($db, $email){
    $sql = $db->prepare("SELECT * FROM users WHERE email=:email");
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->execute();
    if ($sql->rowCount() > 0) {
        $valid = false;
    }
    else {
        $valid = true;
    }
    return $valid;
}

function displayRecord($db, $lastID){
        $sql = $db->prepare("SELECT * FROM account WHERE id=:id");
        $sql->bindParam(':id', $lastID, PDO::PARAM_INT);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $account = $sql->fetch(PDO::FETCH_ASSOC);
            $data = "";
            $data .= "<h2>Results</h2><br/>";
            $data .= "<h3>EMAIL:</h3>" . $account['email'] . "<br/>";
            $data .= "<h3>PHONE:</h3>" . $account['phone'] . "<br/>";
            $data .= "<h3>HEARD FROM:</h3>" . $account['heard'] . "<br/>";
            $data .= "<h3>CONTACT BY:</h3>" . $account['contact'] . "<br/>";
            $data .= "<h3>COMMENTS:</h3>" . $account['comments'] . "<br/>";

            return($data);
        }
        else{
            echo("Problem displaying record");
        }
}

function displayAll($db){
    try {
        $sql = $db->prepare("SELECT * FROM account");
        $sql->execute();

        $accounts = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            $table .= "<tr><th>EMAIL</th><th>PHONE</th><th>HEARD FROM</th><th>CONTACT BY</th><th>COMMENTS</th>";
            foreach ($accounts as $account) {
                $table .= "<tr><td>" . $account['email'] . "</td>";
                $table .= "<td>" . $account['phone'] . "</td>";
                $table .= "<td>" . $account['heard'] . "</td>";
                $table .= "<td>" . $account['contact'] . "</td>";
                $table .= "<td>" . $account['comments'] . "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "No data to report.";
        }
        return $table;
    } catch (PDOException $e) {
        die("there was a problem retrieving data err:1");
    }
}