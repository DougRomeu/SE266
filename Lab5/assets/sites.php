<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/8/2017
 * Time: 1:56 PM
 */
function validateSite($db, $site){
    $sql = $db->prepare("SELECT * FROM sites WHERE site=:site");
    $sql->bindParam(':site', $site, PDO::PARAM_STR);
    $sql->execute();
    if ($sql->rowCount() > 0) {
        $valid = false;
    }
    else {
        $valid = true;
    }
    return $valid;
}

function addSite($db, $site){
    try{
        $sql = $db->prepare("INSERT INTO sites VALUES (null, :site, NOW())");
        $sql->bindParam(':site', $site, PDO::PARAM_STR);
        $sql->execute();
        $lastid = $db->lastInsertedId;
        echo (" Added");

        $file = file_get_contents("$site");
        preg_match_all('/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/', $file, $matches, PREG_OFFSET_CAPTURE);
        //$temp = implode("|", $matches);
        foreach($matches as $match){
            addLinks($db, $lastid, $match);
        }

        return $sql->rowCount();
    }
    catch (PDOException $e){
        die("There was a problem entering data.");
    }
}

function addLinks($db, $id, $match){
    try{
        $sql = $db->prepare("INSERT INTO sitelinks VALUES (:id, :link");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':link', $match, PDO::PARAM_STR);

        $sql->execute();

        return $sql->rowCount();
    }
    catch (PDOException $e){
        die("There was a problem entering data.");
    }
}

function getSiteNames($db){
    try{
        $sql = $db->prepare("SELECT * FROM sites");
        $sql->execute();
        $sites = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $form = "<form method='get' action='#'>" . PHP_EOL;
            $form .= "<select><option value='default'>Select a Site</option>";
            foreach ($sites as $site) {
                $form .= "<option value='test'>" . $site['site'] . "</option>";
            }
        $form .= "</select><input type='submit' name='action' value='Search'></form>";
        return $form;
    }
    else{
        }
    }
    catch (PDOException $e){
        die("There was a problem entering data.");
    }
}