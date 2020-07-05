<?php
require_once "connection.php";
$library = new library();


$title = $_POST["value"] ?? null;
$id = $_POST["id"] ?? null;
$result = $library->NewColumn($title,$id);

 ?>
