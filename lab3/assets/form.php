<h1>Add New Data</h1>
<?php
include_once ("header.php");
?>

<br />
<h3>Add a new corp to the database, click the Home link in order to return to view the database</h3>
<br />
<form method="post" action="#">
    Corp: </br><input type="text" name="corp" id="corp"/><br />
    incorp_dt: </br><input type="text" name="incorp_dt" id="incorp_dt"/><br />
    Email: </br><input type="text" name="email" id="email"/><br />
    Zip Code: </br><input type="text" name="zipcode" id="zipcode"/><br />
    Owner: </br><input type="text" name="owner" id="owner"/><br />
    Phone: </br><input type="text" name="phone" id="phone"/><br />
    <br />
    <input type="submit" name="action" value="Add"/>
    <br />
    <br />
    <a href="index.php">Home</a>
</form>
<?php
include_once ("footer.php");
?>