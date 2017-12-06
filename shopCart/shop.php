<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/30/2017
 * Time: 4:58 PM
 */

require_once ("assets/control.php");
include_once('assets/header.php');

?>

<h1>SHOPPING PAGE</h1>
<?php echo(getCategoryNames($db))?><input type="submit" name="action" value="Search">

<?php
echo(displayProducts($db, $category));
?>
<br />
<br />
<h1>CART</h1>
<?php
    $total = 0;
    if(isset($_SESSION['cart']) || count($_SESSION['cart']) > 0){
        foreach($_SESSION['cart'] as $index => $value){
            $price = displayProduct($db, $value, $index);

            if($price != -1){
                $total += $price;
                $_SESSION['total'] = $total;
            }
        }

        echo "<br /><br />Total: $  $total";
    }else{
        echo "<h4>Cart is currently empty...</h4>";
    }
    ?>
<br />
    <form action="checkout.php">
        <input type="submit" id="btnCheckout" name="checkout" value="Checkout">
    </form>
    <br />
    <br />
<form method="POST" action="#">
    <input type="submit" name="action" value="Clear Cart"/>
</form>
<?php
include_once('assets/footer.php')
?>