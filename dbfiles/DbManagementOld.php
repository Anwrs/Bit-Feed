<?php
require "DBController.php";
class library extends DBController
{


		public function connect() {
       $servername;
       $username;
       $password;
       $dbname;
      $charset;
			$this->servername= "localhost:3306";
			$this->username="bit-feed";
			$this->password="o6ai9r9G7K8GzX7pNNnquYCz34H7dv";
			$this->dbname="bit-feed";
			$this->charset="utf8mb4";

					try {
						$dsn ="mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
						$pdo = new PDO($dsn, $this->username,$this->password);
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						return $pdo;
					} catch (PDOException $e) {
							echo "Connection failed: " . $e->getMessage();
					}
				}


    function InsertColumnIdAndContent($position, $projectId)
    {
      try {
      $this->conn = new PDO("mysql:host =localhost:3306,dbname=retroboard,charset=utf8mb4","bit-feed","o6ai9r9G7K8GzX7pNNnquYCz34H7dv");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
      return $this->conn;
        $db_handle = new DBController();
        $query = "SELECT * FROM tbl_items WHERE items_id=:items_id AND project_id=:project_id";
        $result = $db_handle->runQuery($query, $position,$projectId);
        return $result;
    }


     function getAllTblContents($projectId)
     {
       try {
       $this->conn = new PDO("mysql:host =localhost:3306,dbname=retroboard,charset=utf8mb4","bit-feed","o6ai9r9G7K8GzX7pNNnquYCz34H7dv");
           $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       } catch (PDOException $e) {
           echo "Connection failed: " . $e->getMessage();
       }
       return $this->conn;
       $db_handle = new DBController();
       $query = "SELECT * FROM tbl_name WHERE project_id='$projectId'";
        $result = $db_handle->runBaseQuery($query);
       return $result;
    }

    function getAllItems($projectId)
    {
      try {
      $this->conn = new PDO("mysql:host =localhost:3306,dbname=retroboard,charset=utf8mb4","bit-feed","o6ai9r9G7K8GzX7pNNnquYCz34H7dv");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
      return $this->conn;
      $db_handle = new DBController();
      $db_handle->connect();
      $query = "SELECT * FROM tbl_items WHERE project_id='$projectId'";
       $result = $db_handle->runBaseQuery($query);
      return $result;
   }

    function editTaskStatus($status_id, $task_id)
    {
      try {
      $this->conn = new PDO("mysql:host =projects.bit-academy.nl,dbname=retroboard,charset=utf8mb4","bit-feed","o6ai9r9G7K8GzX7pNNnquYCz34H7dv");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
      return $this->conn;
      $db_handle = new DBController();
      $db_handle->connect();
        $query = "UPDATE tbl_items SET items_id =:items_id WHERE id =:id";
        $result = $db_handle->update($query,$status_id, $task_id);
        return $result;
    }

    function InsertNewCard($title,$items_id,$projectId)
    {
      try {
      $this->conn = new PDO("mysql:host =projects.bit-academy.nl,dbname=retroboard,charset=utf8mb4","bit-feed","o6ai9r9G7K8GzX7pNNnquYCz34H7dv");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
      return $this->conn;
      $db_handle = new DBController();
      $db_handle->connect();
      $query = "INSERT INTO tbl_items(`items_id`, `title`, `project_id`) VALUES (?,?,?)";
      $result = $db_handle->insertNew($query,$title,$items_id,$projectId);
      return $result;
    }

    function NewColumn($title,$projectName,$projectId)
    {
      try {
      $this->conn = new PDO("mysql:host =projects.bit-academy.nl,dbname=retroboard,charset=utf8mb4","bit-feed","o6ai9r9G7K8GzX7pNNnquYCz34H7dv");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
      return $this->conn;
      $db_handle = new DBController();
      $db_handle->connect();
      $query = "INSERT INTO tbl_name (`container_name`,`project_name`,`project_id`) VALUES (?,?,?)";
      $result = $db_handle->insertColumn($query,$title,$projectName,$projectId);
      return $result;
    }

    function UpdateCard($title,$id){
      try {
      $this->conn = new PDO("mysql:host =projects.bit-academy.nl,dbname=retroboard,charset=utf8mb4","bit-feed","o6ai9r9G7K8GzX7pNNnquYCz34H7dv");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
      return $this->conn;
      $db_handle = new DBController();
      $db_handle->connect();
      $query = "UPDATE tbl_items SET `title` = :title WHERE `id`=:id";
      $result = $db_handle->updateItem($query,$title,$id);
      return $result;
    }

    function UpdateHeader($title,$id)
    {
      try {
      $this->conn = new PDO("mysql:host =localhost:3306,dbname=retroboard,charset=utf8mb4","bit-feed","o6ai9r9G7K8GzX7pNNnquYCz34H7dv");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
      return $this->conn;
      $db_handle = new DBController();
      $db_handle->connect();
      $query = "UPDATE tbl_name SET container_name =? WHERE container_id =?";
      $result = $db_handle->updateTitle($query,$title,$id);
      return $result;
    }

    function getProjectname(int $projectId)
    {
      try {
      $this->conn = new PDO("mysql:host =localhost:3306,dbname=retroboard,charset=utf8mb4","bit-feed","o6ai9r9G7K8GzX7pNNnquYCz34H7dv");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
      return $this->conn;
      $db_handle = new DBController();
      $db_handle->connect();
      $query = "SELECT `goal` FROM Goals WHERE goal_id=$projectId";
      $result = $db_handle->runBaseQuery($query);
      return $result;
    }
}


 ?>
