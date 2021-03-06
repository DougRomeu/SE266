<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doug Rose</title>
    <link href="https://fonts.googleapis.com/css?family=Monda" rel="stylesheet">
    <style>
        body {font-family: 'Monda', sans-serif;
            height: 100%;
            width: 100%;
            padding: 0;
            margin:0;
            position: absolute;}
        *:focus{
            outline:0;
        }
        #wrapper {
            background-image: url('images/arkhd5.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            /*position: fixed;*/
            /*height: 100%;*/
            /*width: 100%;*/
            position:absolute;
            top:0;
            left:0;
            bottom: 0;
            right:0;
        }

        #loginBox {
            background-color: #fafafa;
            width: 320px;
            height: 470px;
            margin: auto;
            box-shadow: -5px 8px 5px rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);;
            border-radius: 14px;
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
        }
        #loginHeader {
            background-image: url('images/lock.jpg');
            text-align: center;
            padding: 2px 0;
            color: #7d0000;
            border-top-left-radius: 14px;
            border-top-right-radius: 14px;}
        #formBox {
            width: 200px;
            margin: auto;}
        #emailBox {
            margin: auto;
            text-align: center;
            color: #7d0000;}
        #passwordBox {
            margin: auto;
            text-align: center;
            color: #7d0000;}
        #buttonBox {
            width:auto;
            text-align: center;
            margin-top: 40px;}
        #btnLogin {
            font-family: 'Monda', sans-serif;
            text-align: center;
            height: 50px;
            width: 200px;
            background-color: #7d0000;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 14px;
            border: 2px solid white;
            cursor: pointer;}
        #btnLogin:hover {
            background-color: white;
            color: #7d0000;
            border: 2px solid #7d0000;
            transition-duration: 0.4s;
            box-shadow: 0 10px 12px 0 rgba(0,0,0,0.24), 0 10px 20px 0 rgba(0,0,0,0.19);}
        #btnLogin:active {
            background-color: white;
            color: #7d0000;
            border: 2px solid #7d0000;
            box-shadow: 0 3px 4px 0 rgba(0,0,0,0.24), 0 4px 12px 0 rgba(0,0,0,0.19);
            transform: translateY(4px);}
        #btnLogin:focus {
            outline: none;
            transition-duration: 0.4s;}
        #password {
            height: 25px;
            width: 190px;
            border-radius: 8px;
            padding-left: 10px;
            border: 1px solid #7d0000;}
        #password:focus {
            outline: none;}
        #email {
            height: 25px;
            width: 190px;
            border-radius: 8px;
            padding-left: 10px;
            border: 1px solid #7d0000;}
        #email:focus {
            outline: none;}
        h3 {
            margin-bottom: 0;}
        #forgotPasswordBox{
            width: 200px;
            height: 40px;
            color: #7d0000;
            padding-top: 30px;
            text-align: center;}
        #fgtPass {
            text-decoration: none;
            color:#7d0000;}
        #fgtPass:hover {
            color: #bf0000;
            font-weight: bold;}
        #fgtPass:focus {
            outline: none;
            color: #bf0000;
            font-weight: bold;}
        #registerBox{
            width: 200px;
            height: 50px;
            color: #7d0000;
            text-align: center;}
        #register {
            text-decoration: none;
            color:#7d0000;}
        #register:hover {
            color: #bf0000;
            font-weight: bold;}
        #register:focus {
            outline: none;
            color: #bf0000;
            font-weight: bold;}
    </style>
</head>
<body>
<div id="wrapper">

    <div id="loginBox">
        <div id="loginHeader">
            <h1>.</h1>
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
</body>
</html>