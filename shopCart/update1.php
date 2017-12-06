<?php
include_once ("assets/header.php");
require_once ("assets/dbconn.php");
require_once ("assets/products.php");
$db = dbconn();
echo updateForm1($db);
require_once ("assets/control.php");
include_once ("assets/footer.php");
?>

