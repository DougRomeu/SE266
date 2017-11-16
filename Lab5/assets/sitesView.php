<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/8/2017
 * Time: 1:57 PM
 */


function viewSiteLinks($db, $id)
{
    $sql = $db->prepare("SELECT * FROM sites JOIN sitelinks ON sites.site_id = sitelinks.site_id WHERE sites.site_id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $sites = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>Links from ".$sites[0]['site']." on date ".$sites[0]["date"]."</h1>";

    $view = "<section><table><caption>Rows returned " . $sql->rowCount() . "</caption><tbody>";

    foreach($sites as $site){
        $view .= "<tr><td><a href='" . $site['link'] . "' target='_blank'> " . $site['link'] . " </a></td></tr>";
    }

    $view .= "</tbody></table></section>";

    return $view;
}
