<?php
require_once "DbManagement.php";
$library = new library();
$title = $_POST["valueText"] ?? null;
$id = $_POST["id_container"] ?? null;
$result = $library->UpdateHeader($title,$id);

 ?>
