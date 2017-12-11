<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 12/11/2017
 * Time: 11:45 AM
 */

include_once("assets/header.php");
include_once("assets/control.php");
?>

    <div>
        <h1>View Database</h1>

        <?php echo(displayAll($db)); ?>
    </div>

<?php
include_once("assets/footer.php");
