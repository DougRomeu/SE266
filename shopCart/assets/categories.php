<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 11/30/2017
 * Time: 5:29 PM
 */

function addCat($db, $category){
    try{
        $sql = $db->prepare("INSERT INTO categories (category) VALUES (:category)");
        $sql->bindParam(':category', $category);
        $sql->execute();
        echo ("<h2>Successfully Added New Category :)</h2>");
        return $sql->rowCount();
    }
    catch (PDOException $e){
        die("There was a problem adding category to the data base.");
    }
}

function getCategoryNames($db){
    try{
        $sql = $db->prepare("SELECT * FROM categories");
        $sql->execute();
        $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $form = "<br/><form method='post' action='#'>" . PHP_EOL;
            $form .= "<select name='category'><option value='default'>Select a Category</option>";
            foreach ($categories as $category) {
                $form .= "<option  value='".$category['category_id']."'>" . $category['category'] . "</option>";
            }
            $form .= "<br />";
            return $form;
        }
        else{
        }
    }
    catch (PDOException $e){
        die("There was a problem entering data.");
    }
}

function viewCat($db){
    try {
        $sql = $db->prepare("SELECT * FROM categories");
        $sql->execute();

        $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            $table .= "<tr><th>Category Name</th>";
            foreach ($categories as $category) {
                $table .= "<tr><td>" . $category['category'];
                $table .= "</td><td><a href='update.php?id=" . $category['category_id'] . "'>Update</a>";
                $table .= "</td><td><a href='delete.php?id=" . $category['category_id'] . "'>Delete</a>";
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "No categories to report.";
        }
        return $table;
    } catch (PDOException $e) {
        die("there was a problem retrieving categories err:1");
    }
}

function deleteCat($db){
    try{
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ??
            filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? "";
        $sql = $db->prepare("DELETE FROM categories WHERE category_id=:id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $p = "<br /><p>Delete Success</p>";
    } catch (PDOException $e){
        die("There was a problem deleting data.");
    }
    return $p;
}

function updateCat($db, $category){
    try{
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ??
            filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? "";

        $sql = $db->prepare("UPDATE categories SET category=:category WHERE category_id=:id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':category', $category);
        $sql->execute();
        $p = "<br /><p>Update Success</p>";
    }
    catch (PDOException $e){
        die("There was a problem entering data.");
    }
    return $p;
}


function updateForm($db){
    try {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING) ??
            filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING) ?? "";

        $sql = $db->prepare("SELECT * FROM categories WHERE category_id=:id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $form = "<form method='post' action='#'>" . PHP_EOL;
            foreach ($categories as $category) {
                $form .= "Category Name:</br><input type='text' name='category' id='category' value='" . $category['category'] . "'/><br />";
                $form .= "<input type='submit' name='action' value='Update'/>";
                $form .= "<br /><a href=\"category.php\">Back</a>";
                //$form .= "<a href='delete.php?id=" . $category['category_id'] . "'>Delete</a>";
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
