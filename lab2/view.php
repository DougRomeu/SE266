<h1>Actor Database</h1>
<?php
require_once ("assets/dbconn.php");
require_once ("assets/actors.php");

include_once ("assets/header.php");
$db = dbconn();

echo (getActorsAsTable($db));


include_once ("assets/footer.php");
