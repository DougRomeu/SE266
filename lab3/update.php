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
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
//$incorp_dt = filter_input(INPUT_POST, 'incorp_dt', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
switch ($action){
    case "Add":
        addCorp($db, $corp, $email, $zipcode, $owner, $phone);
        break;
    case "Update":
        echo updateCorp($db, $corp, $zipcode, $email, $owner, $phone, $id);
        header("Refresh:0");
        break;
}
include_once ("assets/footer.php");
?>

