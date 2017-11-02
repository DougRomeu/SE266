<h1>Search</h1>
<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 10/23/2017
 * Time: 12:22 PM
 */
//include_once ("assets/header.php");
require_once ("assets/dbconn.php");
include_once ("assets/corps.php");
require_once ("assets/control.php");
$db = dbconn();
//require_once ("assets/control.php");
?>
<form method="get" action="#">
    <select name='col'> <?php PHP_EOL ?>
        <option value="corp">Corp</option>
        <option value="email">Email</option>
        <!--<option value="zip">Zip Code</option>-->
        <option value="owner">Owner</option>
        <!--<option value="phone">Phone</option>-->
    </select> <?php PHP_EOL ?>
    <input type="text" name="terms" placeholder="enter search terms">
    <br />
    <br />
    <input type="submit" name="action" value="Search">
    <input type="submit" name="action" value="Reset" onclick="reset()";>
</form>
<?php
//include_once ("assets/footer.php");
?>