<h1>Delete</h1>
<?php
include_once ("assets/header.php");
require_once ("assets/dbconn.php");
require_once ("assets/products.php");
$db = dbconn();
echo deletePro($db);
?>
<a href="product.php">Back</a>
<?php
include_once ("assets/footer.php");
?>