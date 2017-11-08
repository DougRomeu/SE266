<h1>Add</h1>
<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/8/2017
 * Time: 1:43 PM
 */
require_once ('assets/dbconn.php');


include_once ('assets/header.php');
?>

<h3>Use this form to add a valid URL to the database.</h3>

<form method="post" action="#">
    <input type="text" placeholder="URL" name="site">
    <input type="submit" name="action" value="Add">
</form>

<?php
include_once ('assets/footer.php');