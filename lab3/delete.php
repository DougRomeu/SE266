<h1>Delete</h1>
<?php
include_once ("assets/header.php");
require_once ("assets/dbconn.php");
require_once ("assets/corps.php");
$db = dbconn();
echo deleteCorp($db);
?>
<a href="index.php">Home</a>
<?php
include_once ("assets/footer.php");
?>