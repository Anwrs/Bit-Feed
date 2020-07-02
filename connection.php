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

    function editTaskStatus($status_id, $task_id)
    {
      $db_handle = new DBController();
        $query = "UPDATE retroboard.tbl_items SET items_id =:items_id WHERE id =:id";
        $result = $db_handle->update($query,$status_id, $task_id);
        return $result;
    }

}


 ?>
