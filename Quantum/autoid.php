<?php 
//session_start();
require ('connect.php');
function autoincemp()
{
    global $value2;
    $query = "SELECT brand_id from brand order by brand_id desc LIMIT 1";
    $mysqli = $this->mydb->prepare($mysqli,$query);
    $mysqli->execute();

    if ($mysqli->rowCount() > 0) {
        $row = $mysqli->fetch(PDO::FETCH_ASSOC);
        $value2 = $row['brand_id'];
        $value2 = substr($value2, 3, 5);
        $value2 = (int) $value2 + 1;
        $value2 = "EMP" . sprintf('%04s', $value2);
        $value = $value2;
        return $value;
    } else 
    {
        $value2 = "B000001";
        $value = $value2;
        return $value;
    }
}
?>