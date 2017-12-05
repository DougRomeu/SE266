<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 12/3/2017
 * Time: 11:50 AM
 */
function addPro($db, $category, $product, $price, $image){
    try{
        $sql = $db->prepare("INSERT INTO products (product_id, category_id, product, price, image) VALUES (NULL, :category_id, :product, :price, :image)");
        $sql->bindParam(':category_id', $category, PDO::PARAM_STR);
        $sql->bindParam(':product', $product, PDO::PARAM_STR);
        $sql->bindParam(':price', $price, PDO::PARAM_INT);
        $sql->bindParam(':image', $image, PDO::PARAM_STR);
        $sql->execute();
        echo ("<h2>Successfully Added New Product :)</h2>");
        return $sql->rowCount();
    }
    catch (PDOException $e){
        die("There was a problem adding product to the data base.");
    }
}

function viewPro($db){
    try {
        $sql = $db->prepare("SELECT * FROM products");
        $sql->execute();

        $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            $table .= "<tr><th>Product Name</th><th>Price USD</th>";
            foreach ($products as $product) {
                $table .= "<tr><td>" . $product['product'];
                $table .= "</td><td>" . $product['price'];
                //$table .= "</td><td>" . $product['category_id'];
                $table .= "</td><td><a href='update1.php?id=" . $product['product_id'] . "'>Update</a>";
                $table .= "</td><td><a href='delete1.php?id=" . $product['product_id'] . "'>Delete</a>";
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "No products to report.";
        }
        return $table;
    } catch (PDOException $e) {
        die("there was a problem retrieving products err:1");
    }
}

function deletePro($db){
    try{
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ??
            filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? "";
        $sql = $db->prepare("DELETE FROM products WHERE product_id=:id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $p = "<br /><p>Delete Success</p>";
    } catch (PDOException $e){
        die("There was a problem deleting data.");
    }
    return $p;
}

function updatePro($db, $product, $price){
    try{
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ??
            filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? "";

        $sql = $db->prepare("UPDATE products SET product=:product, price=:price WHERE product_id=:id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':product', $product, PDO::PARAM_STR);
        $sql->bindParam(':price', $price, PDO::PARAM_STR);
        $sql->execute();
        $p = "<br /><p>Update Success</p>";
    }
    catch (PDOException $e){
        die("There was a problem entering data.");
    }
    return $p;
}


function updateForm1($db){
    try {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ??
            filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? "";


        $sql = $db->prepare("SELECT * FROM products WHERE product_id=:id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $form = "<form method='post' action='#'>" . PHP_EOL;
            foreach ($products as $product) {
                $form .= "Product Name:</br><input type='text' name='product' id='product' value='" . $product['product'] . "'/><br />";
                $form .= "Price:</br><input type='text' name='price' id='price' value='" . $product['price'] . "'/><br />";
                $form .= "<input type='submit' name='action' value='Renew'/>";
                $form .= "<br /><a href='product.php'>Back</a>";
            }
        } else {
            echo ($id);
            $form = "nothing to see here";
            $form .= "<br /><a href=\"index.php\">Home</a>";
        }
        return $form;
    }catch(PDOException $e){
        die("There was a problem grabbing the data");
    }
}

function displayProducts($db, $category){
    try {
        $sql = $db->prepare("SELECT * FROM products WHERE category_id=:category_id");
        $sql->bindParam(':category_id', $category, PDO::PARAM_STR);
        $sql->execute();

        $products = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            $table .= "<tr><th>Product Name</th><th>Price USD</th><th>Image</th>";
            foreach ($products as $product) {
                $table .= "<tr><td>" . $product['product'];
                $table .= "</td><td>" . $product['price'];
                $table .= "</td><td>" . $product['image'];
                //$table .= "</td><td><a href='?id=" . $product['product_id'] . "'>Add to Cart</a>";
                //$table .= "</td><td><input type='hidden' name='action' value='?id=" . $product['product_id'] . "'>";
                $table .= "</td><td><input type='submit' name='action' value='Add to Cart'>";
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "<br /><br />No products to report. Please select a category to search by.";
        }
        return $table;
    } catch (PDOException $e) {
        die("there was a problem retrieving products err:1");
    }
}