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

function returnSite(){
echo ("bad");
}

function addSite(){
echo ("good");
}
