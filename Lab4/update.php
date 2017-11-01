<h1>Update Data</h1>
<?php
include_once ("assets/header.php");
require_once ("assets/dbconn.php");
require_once ("assets/corps.php");
$db = dbconn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? "";
echo updateForm($db, $id);
?>

<?php
require_once ("assets/control.php");
include_once ("assets/footer.php");
?>

