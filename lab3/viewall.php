<?php
/**
 * Created by PhpStorm.
 * User: Doug
 * Date: 10/23/2017
 * Time: 11:53 AM
 */

require_once ("assets/dbconn.php");

$db = dbconn();

echo (getCorpsAsTable($db));

