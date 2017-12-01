<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/29/2017
 * Time: 5:42 PM
 */

include ('assets/control.php');

include_once('assets/header.php');

if($_SESSION["logged_in"]){
    header("Location: admin.php");
}
?>
<div id="registerBox">
    <div id="registerHeader">
        <h1>Register</h1>
    </div>
    <div id="formBox">
        <form method="post" action="#">
            <div id="emailBox">
                <h3>Email</h3>
                <input type="text" id="email" name="email">
            </div>
            <div id="passwordBox">
                <h3>Password</h3>
                <input type="password" id="password" name="password" >
            </div>
            <div id="passwordBox2">
                <h3>Confirm Password</h3>
                <input type="password" id="password2" name="password2" >
            </div>
            <div id="buttonBox">
                <input type="submit" id="btnRegister" name="action" value="Register">
            </div>
            <div id="cancelBox">
                <a href="login.php" id="cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php
include_once('assets/footer.php')
?>

