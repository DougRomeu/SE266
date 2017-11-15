<h1>View</h1>
<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/8/2017
 * Time: 1:43 PM
 */
require_once ('assets/dbconn.php');


include_once ('assets/header.php');
include_once ('assets/control.php');
include_once ('assets/sites.php');

echo getSiteNames($db);

include_once ('assets/footer.php');