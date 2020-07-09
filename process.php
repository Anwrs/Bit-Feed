<?php


  if (isset($_POST['btn-send'])) {
    // code...
    // echo "Workng";
    $UserName = $_POST['username'];
    $Email = "From:".$_POST['email'];
    $Subject = $_POST['subject'];
    $Msg = $_POST['msg'];



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
