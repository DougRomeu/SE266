<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 10/23/2017
 * Time: 11:53 AM
 */

require_once ("assets/dbconn.php");
require_once ("assets/corpsView.php");
$db = dbconn();

echo (getCorpsAsTable($db));

?>
<br />
<br />
<a href="add.php" name="action" id="Create">Create</a>
