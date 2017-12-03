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

