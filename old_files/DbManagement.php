<?php
require "DBController.php";
class library
{


    function InsertColumnIdAndContent($position, $projectName)
    {
        $db_handle = new DBController();
        $query = "SELECT * FROM retroboard.tbl_items WHERE items_id=:items_id AND project_name=:project_name";
        $result = $db_handle->runQuery($query, $position,$projectName);
        return $result;
    }


     function getAllTblContents()
     {
       $db_handle = new DBController();
       $query = "SELECT * FROM retroboard.tbl_name";
        $result = $db_handle->runBaseQuery($query);
       return $result;
    }

    function getAllItems()
    {
      $db_handle = new DBController();
      $query = "SELECT * FROM retroboard.tbl_items";
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

    function InsertNewCard($title,$items_id,$projectName)
    {
      $db_handle = new DBController();
      $query = "INSERT INTO retroboard.tbl_items(`items_id`, `title`, `project_name`) VALUES (?,?,?)";
      $result = $db_handle->insertNew($query,$title,$items_id,$projectName);
      return $result;
    }

    function NewColumn($title,$id)
    {
      $db_handle = new DBController();
      $query = "INSERT INTO retroboard.tbl_name (`container_name`,`container_id`) VALUES (?,?)";
      $result = $db_handle->insertColumn($query,$title,$id);
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
      // echo "edede";
      $db_handle = new DBController();
      $query = "UPDATE retroboard.tbl_name SET container_name =? WHERE container_id =?";
      $result = $db_handle->updateTitle($query,$title,$id);
      return $result;
    }

    // function getProjectname($link)
    // {
    //   $db_handle = new DBController();
    //   $query = "SELECT * FROM retroboard.goals WHERE goal_id=$link";
    //   $result = $db_handle->startQuery($query,$link);
    //   return $result;
    // }
}


 ?>
