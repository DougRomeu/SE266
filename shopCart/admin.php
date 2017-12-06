<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/30/2017
 * Time: 12:42 PM
 */

include_once('assets/control.php');
include_once('assets/header.php');

if (!$_SESSION['logged_in']){
    header('Location: login.php'); //<- if not logged in, send them to log in page.
}else{
    echo "User Is Logged In<br>";
    //print_r($_SESSION);
}
?>
    <form action="category.php">
        <input type="submit" id="btnAddCat" name="addCat" value="Edit Categories">
    </form>
    <form action="product.php">
        <input type="submit" id="btnAddPro" name="addPro" value="Edit Products">
    </form>

    <form method="POST" action="#">
        <input type="submit" name="action" value="Logout"/>
    </form>
<?php
include_once('assets/footer.php')
?>