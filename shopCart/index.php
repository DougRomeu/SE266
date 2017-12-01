<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/29/2017
 * Time: 5:26 PM
 */

include_once('assets/header.php');

?>

<h1>Welcome to Doug's Online Shop</h1>
<br />
<h3>Please log in or register to access Admin controls.</h3>

<form action="login.php">
    <input type="submit" id="btnLogin" name="login" value="Login/Register">
</form>
<br />
<br />
<br />

<h3>To begin shopping, click the button below.</h3>
<br />
<form action="shop.php">
    <input type="submit" id="btnShop" name="shop" value="SHOP NOW">
</form>

<?php
include_once('assets/footer.php')
?>

