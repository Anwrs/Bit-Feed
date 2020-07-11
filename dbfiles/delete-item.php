<?php
require_once "DbManagement.php";
$library = new library();


$items_id = $_POST["id"] ?? null;
$result = $library->deleteItem($items_id);

 ?>
