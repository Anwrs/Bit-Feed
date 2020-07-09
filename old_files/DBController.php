<?php
class DBController {
	private $host = "localhost";
	private $user = "bit-feed";
	private $password = "o6ai9r9G7K8GzX7pNNnquYCz34H7dv";
	private $database = "bit-feed";
	private $conn;

    function __construct() {
        $this->conn = $this->connectDB();
	}

	function connectDB() {
				try {
				$this->conn = new PDO("mysql:host =localhost,dbname=retroboard","root","");
						$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						echo "Connected successfully";
				} catch (PDOException $e) {
						echo "Connection failed: " . $e->getMessage();
				}
				return $this->conn;
			}



    function getQuery($query)
		{
        $result = $this->conn->query($query);
        return $result;
    }


		function runBaseQuery($query)
		{
				$sth = $this->conn->query($query);
				if ($sth->rowCount() > 0)
				{
						while($row = $sth->fetch(PDO::FETCH_ASSOC))
						{
								$resultset[] = $row;
						}
				}
				if(!empty($resultset)){
					return $resultset;
				}
		}



    function runQuery($query,$position,$projectName)
		{
        $sth = $this->conn->prepare($query);
				$sth->bindParam(':items_id',$position,PDO::PARAM_INT);
				$sth->bindParam(':project_name',$projectName,PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() > 0) {
            while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $resultset[] = $row;
            }
        }

        if(!empty($resultset))
				{
			return $resultset;
        }
    }


		function updateItem($query,$title,$id){
				$sth = $this->conn->prepare($query);
				$sth->bindParam(":title",$title,PDO::PARAM_STR);
				$sth->bindParam(":id",$id,PDO::PARAM_STR);
				$sth->execute();
		}
		function insertColumn($query,$title,$id)
		{
			$sth = $this->conn->prepare($query);
			$sth->bindParam(1,$title,PDO::PARAM_STR);
			$sth->bindParam(2,$id,PDO::PARAM_STR);
			$sth->execute();
		}


		function insertNew($query,$title,$items_id,$projectName){
					$sth = $this->conn->prepare($query);
					$sth->bindParam(1,$items_id,PDO::PARAM_STR);
					$sth->bindParam(2,$title,PDO::PARAM_STR);
					$sth->bindParam(3,$projectName,PDO::PARAM_STR);
					$sth->execute();
		}

    function update($query, $status_id, $task_id)
		{
        $sth = $this->conn->prepare($query);
				$sth->bindParam(':items_id',$status_id,PDO::PARAM_INT);
				$sth->bindParam(':id',$task_id,PDO::PARAM_INT);
        $sth->execute();
    }


		    function updateTitle($query,$id,$title)
				{
		        $sth = $this->conn->prepare($query);
		        $sth->execute([$id,$title]);
		    }


				function getName($query){
					$sth = $this->conn->prepare($query);
					$sth->execute();
				}

				function executeQuery($query)
				{
						$sth = $this->conn->query($query);
						if ($sth->rowCount() > 0)
						{
								while($row = $sth->fetch(PDO::FETCH_ASSOC))
								{
										$resultset[] = $row;
								}
						}
						if(!empty($resultset)){
							return $resultset;
						}
				}
}
?>
