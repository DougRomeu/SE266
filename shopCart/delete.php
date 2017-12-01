<h1>Delete</h1>
<?php
include_once ("assets/header.php");
require_once ("assets/dbconn.php");
require_once ("assets/categories.php");
$db = dbconn();
echo deleteCat($db);
?>
<a href="category.php">Back</a>
<?php
include_once ("assets/footer.php");
?>