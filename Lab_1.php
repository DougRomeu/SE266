
<?php
//Douglas Rose --- Lab 1
$randNum = 0;
$strHex = "";

function getHex()//Get Hex Value
{
    $strHex = "";
    for ($i = 0; $i < 6; $i++)
    {
        $randNum = mt_rand(1,15);
        switch($randNum)//change 10-15 to A-F
        {
            case 1:
                $strTemp = "1";
                break;
            case 2:
                $strTemp = "2";
                break;
            case 3:
                $strTemp = "3";
                break;
            case 4:
                $strTemp = "4";
                break;
            case 5:
                $strTemp = "5";
                break;
            case 6:
                $strTemp = "6";
                break;
            case 7:
                $strTemp = "7";
                break;
            case 8:
                $strTemp = "8";
                break;
            case 9:
                $strTemp = "9";
                break;
            case 10:
                $strTemp = "A";
                break;
            case 11:
                $strTemp = "B";
                break;
            case 12:
                $strTemp = "C";
                break;
            case 13:
                $strTemp = "D";
                break;
            case 14:
                $strTemp = "E";
                break;
            case 15:
                $strTemp = "F";
                break;
            default:
                break;
        }
        $strHex .= $strTemp;
    }
    return $strHex;
}

$table = "<table>";
for ($rows = 1; $rows <= 10; $rows++)
{
    $table .= "\t<tr>";
    for($cols = 1; $cols <= 10; $cols++)
    {
        $strHex = getHex();//Get the hex number
        $table .= "<td style='background-color:#$strHex;'>$strHex<br /><span style='color:#ffffff;'>$strHex</span></td>";
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