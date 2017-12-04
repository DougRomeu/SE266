<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/30/2017
 * Time: 4:58 PM
 */

require_once ("assets/control.php");
include_once('assets/header.php');

?>

<h1>SHOPPING PAGE</h1>
<?php echo(getCategoryNames($db))?><input type="submit" name="action" value="Search">

<?php
echo(displayProducts($db));

include_once('assets/footer.php')
?>