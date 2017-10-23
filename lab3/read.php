<h1>Read Data</h1>
<?php
include_once ("assets/header.php");


require_once ("assets/dbconn.php");
require_once ("assets/corps.php");
$db = dbconn();

echo readCorp($db);
include_once ("assets/footer.php");
?>
