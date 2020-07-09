<?php
require_once "DbManagement.php";
$library = new library();
$title = $_POST["valueText"] ?? null;
$projectId = $_POST["project_id"] ?? null;
$result = $library->UpdateGoal($title, $projectId);

?>
