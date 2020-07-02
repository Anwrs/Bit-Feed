<?php
require_once "connection.php";
$library = new library();


$newValue = $_POST["value"] ?? null;
echo $newValue;
$answer = $library->UpdateLiText($newValue);
 ?>
