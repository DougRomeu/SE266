<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doug Rose</title>
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <style>
        body {font-family: 'Prompt', sans-serif;}
        #loginBox {background-color: royalblue; width: 320px; height: 450px; margin: auto; margin-top: 120px; box-shadow: -3px 5px 5px #999999;}
        #loginHeader {background-color: #0000bf; text-align: center; padding: 2px 0; color: white;}
        #usernameBox {margin: auto; text-align: center; color: white;}
        #passwordBox {margin: auto; text-align: center; color: white;}
        #buttonBox {width:auto; text-align: center; margin-top: 20px;}
        #btnLogin {text-align: center; height: 50px; width: 150px; background-color: #0000bf; color: white; font-weight: bold; font-size: 20px;}
        #username {height: 25px; width: 200px;}
        #password {height: 25px; width: 200px;}
    </style>
</head>
<body>
<div id="wrapper">
    <div id="loginBox">
        <div id="loginHeader">
            <h1>Please Sign-In</h1>
        </div>
        <div id="formBox">
            <div id="usernameBox">
                <h3>Username</h3>
                <input type="text" id="username" name="username">
            </div>
            <div id="passwordBox">
                <h3>Password</h3>
                <input type="password" id="password" name="password" >
            </div>
            <div id="buttonBox">
                <input type="submit" id="btnLogin" name="login" value="Login">
            </div>
        </div>
    </div>
</div>
</body>
</html>