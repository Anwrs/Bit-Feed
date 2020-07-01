<?php
require "DBController.php";
class library
{


    function InsertColumnIdAndContent($position,$projectName) {
      // var_dump($position);
        $db_handle = new DBController();
        $query = "SELECT * FROM retroboard.tbl_items WHERE items_id=:items_id AND project_name=:project_name";
        $result = $db_handle->runQuery($query, $position,$projectName);
        // if($result->execute()){
            return $result;
          // }
    }

      // function setItemToContainerId($liPos){
      //   $query = "INSERT INTO tbl_items (cont_pos_id) VALUES($liPos)";
      //     $result = $this->pdo->prepare($query);
      //     if($result->execute()){
      //         return $result;
      //       }
      //
      // }


    public function insertItemIdAndPos($items,$positions){
      $db_handle = new DBController();
      $db = 'UPDATE tbl_items SET status_id = ? WHERE id = ?';
      $result = $db_handle->update($query, 'ii', array($status_id, $task_id));
      return $result;
    }

     function getAllTblContents(){
       $db_handle = new DBController();
       $query = "SELECT * FROM retroboard.tbl_name";
        $result = $db_handle->runBaseQuery($query);
       return $result;
    }

    function editTaskStatus($position, $task_id) {
      $db_handle = new DBController();
        $query = "UPDATE tbl_task SET status_id = ? WHERE id = ?";
        $result = $db_handle->query($query, array($status_id, $task_id));
        return $result;
    }

  //   public function getNameAndTitle( $statusId,$projectName){
  //     $db = 'SELECT * FROM tbl_name WHERE status_id= ? AND project_name = ?';
  //     $qy = $this->pdo->query($db, 'is', array($statusId, $projectName));
  //   if($qy->execute()){
  //     return $qy;
  //   }
  // }
  //
  // function getStatusAndName()
  //   {
  //       $db = 'SELECT * FROM tbl_status WHERE project_name = project_name';
  //       $qy = $this->pdo->query($db);
  //     if($qy->execute()){
  //       return $qy;
  //     // code...
  //   }
  //   }



}


 ?>
