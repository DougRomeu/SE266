<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/29/2017
 * Time: 5:42 PM
 */

include_once('assets/header.php')
?>

<div id="loginBox">
    <div id="loginHeader">
        <h1>Log In</h1>
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
            <div id="buttonBox">
                <input type="submit" id="btnLogin" name="action" value="Login">
            </div>
            <div id="registerBox">
                <a href="register.php" id="register">New? Register Here</a>
            </div>
        </form>
    </div>
</div>


<?php
include_once('assets/footer.php')
?>

