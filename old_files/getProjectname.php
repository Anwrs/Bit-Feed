<?php
require_once "DbManagement.php";
$library = new library();


$link= $_POST["link"]?? null;
$result = $library->getProjectname($link);
 ?>
