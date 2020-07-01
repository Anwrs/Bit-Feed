<?php
require_once "connection.php";
$library = new library();

$status_id = $_GET["status_id"];
$task_id = $_GET["task_id"];

$result = $library->editTaskStatus($position, $task_id);
?>
