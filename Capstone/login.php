<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 1/10/2018
 * Time: 11:13 AM
 */

include_once("assets/header.php");
?>

    <div id="wrapper">

        <div id="loginBox">
            <div id="loginHeader">
                <h1>Log In</h1>
            </div>
            <div id="formBox">
                <form method="post" action="#">
                    <div class="textArea">
                        <h3>Email</h3>
                        <input type="text" class="textBox" name="email">
                    </div>
                    <div class="textArea">
                        <h3>Password</h3>
                        <input type="password" class="textBox" name="password" >
                    </div>
                    <div id="buttonBox">
                        <input type="submit" id="btnLogin" name="login" value="Login">
                    </div>
                    <div id="forgotPasswordBox">
                        <a href="#" id="fgtPass">Forgot Password?</a>
                    </div>
                    <div id="registerBox">
                        <a href="register.php" id="register">New? Register Here</a>
                    </div>
                </form>
            </div>
        </div>

    </div>


