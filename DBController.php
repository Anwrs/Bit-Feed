<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "retroboard";
	private $conn;

    function __construct() {
        $this->conn = $this->connectDB();
	}

	function connectDB() {
		// $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
				try {
				$this->conn = new PDO("mysql:host =localhost,dbname=retroboard","root","");
						$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						// echo "Connected successfully";
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
				return $resultset;
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


		// function updateContext($query, $newValue)
		// {
		// 		$sth = $this->conn->prepare($query);
		// 		$sth->bindParam(':newValue',$newValue,PDO::PARAM_INT);
		// 		$sth->execute();
		// }

    // function bindQueryParams($sql, $param_type, $param_value_array) {
    //     $param_value_reference[] = & $param_type;
    //     for($i=0; $i<count($param_value_array); $i++) {
    //         $param_value_reference[] = & $param_value_array[$i];
    //     }
    //     call_user_func_array(array(
    //         $sql,
    //         'bind_param'
    //     ), $param_value_reference);
    // }

    // function insert($query, $param_type, $param_value_array) {
    //     $sql = $this->conn->prepare($query);
    //     $this->bindQueryParams($sql, $param_type, $param_value_array);
    //     $sql->execute();
    // }

    function update($query, $status_id, $task_id)
		{
        $sth = $this->conn->prepare($query);
				$sth->bindParam(':items_id',$status_id,PDO::PARAM_INT);
				$sth->bindParam(':id',$task_id,PDO::PARAM_INT);
        $sth->execute();
    }
}
?>
