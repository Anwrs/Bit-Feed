<?php
require_once "connection.php";
$library = new library();


$title = $_POST["value"] ?? null;
$id = $_POST["id"] ?? null;

// $newValue = $_POST["clicked_id"] ?? null;
// $newValue = $_POST["pr"] ?? null;
// $projectName = "project";

// echo $newValue;
$result = $library->NewColumn($title,$id);
// $result = $library->InsertNewCard($container_clicked,$inputValue,$projectName);
 ?>
