<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 12/6/2017
 * Time: 1:32 PM
 */

include_once('assets/control.php');
include_once('assets/header.php');


$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];

$tmp_name = $_FILES['file']['tmp_name'];

$error = $_FILES['file']['error'];


if(isset($name)){
    if(!empty($name)){
        $location = 'assets/images/';
        if(move_uploaded_file($tmp_name, $location.$name)){
            echo 'Upload Success';
        }
    }else{
        echo 'Please choose a file';
    }
}
?>

<form action="uploads.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file"><br><br>
    <input type="submit" name="action" value="Upload">
</form>
<br>
<br>
<form action="product.php" method="post">
    <input type="submit" value="back">
</form>

<?php
include_once('assets/footer.php')
?>

