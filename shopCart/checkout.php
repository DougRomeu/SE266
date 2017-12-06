<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/29/2017
 * Time: 5:26 PM
 */

include_once('assets/header.php');
include_once('assets/control.php');

?>

<h1>Thanks for Shopping!</h1>
<br />
<?php
echo("Your total is $");
print_r($_SESSION['total']);
?>
<br />
<h4>Your order will ship in 2 days.</h4>
<?php
include_once('assets/footer.php')
?>

