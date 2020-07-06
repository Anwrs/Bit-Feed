<?php
require_once "DbManagement.php";
$library = new library();


$title = $_POST["value"] ?? null;
$id = $_POST["id"] ?? null;
$projectName = $_POST["project_name"] ?? null;

$result = $library->NewColumn($title,$projectName);

 ?>
