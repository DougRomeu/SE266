<?php
$randNum = 0;
$strHex = "";

function getRand()
{
    $randNum = mt_rand(1, 15);
    return $randNum;
}

function getHex()
{
    $randNum = mt_rand(1, 15);
    return $randNum;
}

$table = "<table>";
for ($rows = 1; $rows <= 10; $rows++)
{
    $table .= "\t<tr>";

    for($cols = 1; $cols <= 10; $cols++)
    {
        $randNum = getRand();
        $strHex = getHex($randNum);
        $table .= "<td>" . $randNum . "</td>";
    }

    $table .= "</tr>\n";
}
$table .= "</table>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 1 - Douglas Rose</title>
</head>
<body>
<?php echo $table; ?>
</body>
</html>