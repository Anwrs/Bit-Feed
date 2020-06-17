<?php


  if (isset($_POST['btn-send'])) {
    // code...
    // echo "Workng";
    $UserName = $_POST['username']."\n";
    $Email = "From:".$_POST['email']."\n";
    $Msg = $_POST['msg']."\n";



    if(empty($UserName) || empty($Email) || empty($Subject) || empty($Msg)){
      header('location:contact.php?error');
    } else{
      $to = "bittool.us@gmail.com";


        $retval = mail($to,$Subject,$Msg,$Email);
      if($retval == true)
      {
        header("location:contact.php?succes");
      } else{
        // header("location:contact.php?notsent");
        echo $Email;
        echo $Subject;
        echo $Msg;
      }
    }
  } else {
    {
      header("location:contact.php");
    }
  }


 ?>
