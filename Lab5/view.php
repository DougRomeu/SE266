<h1>View</h1>
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
<form method="get" action="#">
<select>
    <option value="default">Select a Site</option>
    <!--Put these in a for each loop for each site name-->
    <option value="test1">Test 1</option>
    <option value="test2">Test 2</option>
    <option value="test3">Test 3</option>
    <option value="test4">Test 4</option>
</select>
    <input type="submit" name="action" value="Search">
</form>

<?php
include_once ('assets/footer.php');