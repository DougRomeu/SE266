<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/30/2017
 * Time: 5:50 PM
 */

include_once('assets/control.php');
include_once('assets/header.php');

if (!$_SESSION['logged_in']){
    header('Location: login.php'); //<- if not logged in, send them to log in page. Do not have any html data before this line.
}else{
    echo "User Is Logged In<br>";
    //print_r($_SESSION);
}
?>


    <h3>Add A New Product</h3>
    <form method="post" action="#">
        <input type="text" placeholder="Product Name" name="product">
        <?php echo(getCategoryNames($db))?>
        <input type="submit" name="action" value="Submit">
    </form>

    <br />
    <h3>Edit Existing Products</h3>




<?php
include_once('assets/footer.php')
?>