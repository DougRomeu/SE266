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

        $lastid = $db->lastInsertId();
        echo (" Added with the Id: $lastid");

        $file = file_get_contents("$site");
        preg_match_all('/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/', $file, $matches, PREG_OFFSET_CAPTURE);
        //$temp = implode("|", $matches);
        foreach($matches as $m){
            //print_r($m);
            foreach($m as $match){
                addLinks($db, $lastid, $match[0]);
            }

        }
        return $sql->rowCount();
    }
    catch (PDOException $e){
        die("There was a problem entering data.");
    }
}

function addLinks($db, $id, $match){
    try{
        $sql = $db->prepare("INSERT INTO sitelinks (site_id, link) VALUES (:id, :link)");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':link', $match, PDO::PARAM_STR);

        $sql->execute();

        return $sql->rowCount();
    }
    catch (PDOException $e){
        die("There was a problem entering data. with the message $e");
    }
}
//
//  INSERT INTO WHATEVER (site_id, link)
//  VALUES
//  (1,"something"),
//  (1, "something else"),
//  (1, "Something also else");
function getSiteNames($db){
    try{
        $sql = $db->prepare("SELECT * FROM sites");
        $sql->execute();
        $sites = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $form = "<form method='get' action='#'>" . PHP_EOL;
            $form .= "<select name='site' ><option value='default'>Select a Site</option>";
            foreach ($sites as $site) {
                $form .= "<option  value='".$site['site_id']."'>" . $site['site'] . "</option>";
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