<?php
require_once "DbManagement.php";
$library = new library();

$status_id = $_POST["status_id"] ?? null;
$task_id = $_POST["task_id"] ?? null;


$result = $library->editTaskStatus($status_id, $task_id);

?>
