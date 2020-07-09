<?php
require_once "DbManagement.php";
$library = new library();
$title = $_POST["value"] ?? null;
$items_id = $_POST["clicked_id"] ?? null;
$projectId= $_POST["project_id"]?? null;
$result = $library->InsertNewCard($title,$items_id,$projectId);

 ?>
