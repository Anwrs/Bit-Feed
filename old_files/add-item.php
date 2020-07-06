<?php
require_once "DbManagement.php";
$library = new library();


$title = $_POST["value"] ?? null;
$items_id = $_POST["clicked_id"] ?? null;
$projectName= $_POST["project_name"]?? null;
$result = $library->InsertNewCard($title,$items_id,$projectName);

 ?>
