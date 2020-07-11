<?php
require_once "DbManagement.php";
$library = new library();

$containerId = $_POST["clickedId"] ?? null;

$result = $library->deleteColumn($containerId);

?>
