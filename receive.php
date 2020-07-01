<?php

  $requestPayload = file_get_contents("php://input");
  var_dump($requestPayload);
  $dataPOST = trim(file_get_contents('php://input'));
  $xmlData = simplexml_load_string($dataPOST);
  echo $xmlData;


  $pdo;
  $query;
   function __construct(){
    $servername = "localhost";
    $pc_user = "root";
    $pass = "";

      try {
      $this->pdo = new PDO("mysql:host=$servername;dbname=retroboard", $pc_user, $pass);
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }

  	}



  switch ($_REQUEST['action']) {
    case 'sendMessage':
    $query = $pdo->prepare("INSERT INTO tbl_name SET container_name=?");
      $run = $query->execute([$_REQUEST['message']]);

      if( $run){
          echo 1;
          exit;
      }
      echo $_REQUEST['message'];
      break;

    default:
      // code...
      break;
  }
 ?>
