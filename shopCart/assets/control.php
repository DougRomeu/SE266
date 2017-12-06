<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/29/2017
 * Time: 6:17 PM
 */
session_start();
error_reporting(0);
require_once ("dbconn.php");
include_once ("users.php");
include_once ("categories.php");
include_once ("products.php");

$db = dbconn();

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ?? "";
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING) ?? "";
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING) ?? "";
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? NULL;

$category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING) ?? "";

$product = filter_input(INPUT_POST, 'product', FILTER_SANITIZE_STRING) ?? "";
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING) ?? "";
$productId = filter_input(INPUT_POST, 'productId', FILTER_SANITIZE_STRING) ?? "";
$arrayId = filter_input(INPUT_POST, 'arrayId', FILTER_SANITIZE_STRING) ?? "";


$valid = false;

$hash = password_hash($password, PASSWORD_DEFAULT);
$hashed = password_verify($password, $hash);

$_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

switch ($action){
    case "Login":
        $login = loginUser($db, $email, $password);
        if($login["success"]){
            $_SESSION["logged_in"] = true;
            $_SESSION["email"] = $login["data"]["email"];

            print_r($_SESSION);
        }else{
            echo "Failed Login";
        }

        break;
    case "Register":
        $validEmail = validateEmail($db, $email);
        if($email != NULL && $validEmail == true){
            //is valid
            echo "Email Is Valid / ";
            $validPassword = validatePassword($password, $password2);
            if($password != NULL && $validPassword == true){
                //is valid
                echo " Password Is Valid";
                addUser($db, $email, $hash);
            }else{
                //is not valid
                echo "Passwords must match and cannot be blank";
            }
        }else{
            //is not valid
            echo "Email Not Valid or Already Exists";
        }
    case "Logout":
        unset($_SESSION);
        unset($_SESSION["logged_in"]);
        session_destroy();
        header("Location: login.php");
        break;
    case "Submit":
        if($category != NULL){
            addCat($db, $category);
        }
        else{
            echo "Category cannot be left blank";
        }
        break;
    case 'Add':
        $image = $_FILES['file']['name'];
        if($product != NULL && $price != NULL && $category != "Default") {
            addPro($db, $category, $product, $price, $image);
        }
        else{
            echo("Please fill in data fields.");
        }
        break;
    case 'Update':
        echo updateCat($db, $category);
        header("Refresh:0");
        break;
    case 'Renew':
        echo updatePro($db, $product, $price);
        header("Refresh:0");
        break;
    case 'Search':
        //echo displayProducts($db, $category);
        break;
    case 'Add to Cart':
        if($productId != "") {
            array_push($_SESSION['cart'], $productId);
            header("Refresh:0");
        }
        break;
    case 'Remove Product':
        if($arrayId != "") {
            array_splice($_SESSION['cart'], $arrayId, 1);
            header("Refresh:0");
        }
        break;
    case "Clear Cart":
        $_SESSION['cart'] = array();
        break;
    case 'Checkout':
        header("Location: http://localhost/shopCart/login.php");
        die();
        break;
}