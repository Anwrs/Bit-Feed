<?php
require_once "DbManagement.php";
$library = new library();


$title = $_POST["value"] ?? null;
$id = $_POST["id"] ?? null;
$items_id = $_POST["clicked_id"] ?? null;

$result = $library->InsertNewCard($title,$id,$items_id);

 ?>
