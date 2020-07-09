<?php
require "DBController.php";
class library extends DBController
{


    function InsertColumnIdAndContent($position, $projectId)
    {
        $db_handle = new DBController();
        $query = "SELECT * FROM retroboard.tbl_items WHERE items_id=:items_id AND project_id=:project_id";
        $result = $db_handle->runQuery($query, $position,$projectId);
        return $result;
    }


     function getAllTblContents($projectId)
     {
       $db_handle = new DBController();
       $query = "SELECT * FROM retroboard.tbl_name WHERE project_id='$projectId'";
        $result = $db_handle->runBaseQuery($query);
       return $result;
    }

    function getAllItems($projectId)
    {
      $db_handle = new DBController();
      $query = "SELECT * FROM retroboard.tbl_items WHERE project_id='$projectId'";
       $result = $db_handle->runBaseQuery($query);
      return $result;
   }

    function editTaskStatus($status_id, $task_id)
    {
      $db_handle = new DBController();
        $query = "UPDATE retroboard.tbl_items SET items_id =:items_id WHERE id =:id";
        $result = $db_handle->update($query,$status_id, $task_id);
        return $result;
    }

    function InsertNewCard($title,$items_id,$projectId)
    {
      $db_handle = new DBController();
      $query = "INSERT INTO retroboard.tbl_items(`items_id`, `title`, `project_id`) VALUES (?,?,?)";
      $result = $db_handle->insertNew($query,$title,$items_id,$projectId);
      return $result;
    }

    function NewColumn($title,$projectName,$projectId)
    {
      $db_handle = new DBController();
      $query = "INSERT INTO retroboard.tbl_name (`container_name`,`project_name`,`project_id`) VALUES (?,?,?)";
      $result = $db_handle->insertColumn($query,$title,$projectName,$projectId);
      return $result;
    }

    function UpdateCard($title,$id){
      $db_handle = new DBController();
      $query = "UPDATE retroboard.tbl_items SET `title` = :title WHERE `id`=:id";
      $result = $db_handle->updateItem($query,$title,$id);
      return $result;
    }

    function UpdateHeader($title,$id)
    {
      $db_handle = new DBController();
      $query = "UPDATE retroboard.tbl_name SET container_name =? WHERE container_id =?";
      $result = $db_handle->updateTitle($query,$title,$id);
      return $result;
    }

    function getProjectname(int $projectId)
    {
      $db_handle = new DBController();
      $query = "SELECT `goal` FROM retroboard.Goals WHERE goal_id=$projectId";
      $result = $db_handle->runBaseQuery($query);
      return $result;
    }

    function UpdateGoal(string $title, $projectId){
      $db_handle = new DBController();
      $query = "UPDATE retroboard.goals SET goal='$title' WHERE goal_id=$projectId";
      $result = $db_handle->startQuery($query);
      return $result;
    }

    function deleteColumn($containerId){
      $db_handle = new DBController();
      $query = "DELETE FROM `tbl_name` WHERE `tbl_name`.`container_id`=$containerId";
      $result = $db_handle->startQuery($query);
      return $result;
    }

    function deleteItem($items_id){
      $db_handle = new DBController();
      $query = "DELETE FROM `tbl_items` WHERE `tbl_items`.`id` =$items_id";
      $result = $db_handle->startQuery($query);
      return $result;
    }
}


 ?>
