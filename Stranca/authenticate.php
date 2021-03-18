<?php
   include("config.php");
   session_start();

   if(!empty($_POST['email']))
   {
    $em=$_POST['email'];
    $p=$_POST['pass'];
    $query= "SELECT username FROM user WHERE email='$em' AND password='$p'";
    $result=mysqli_query($query);

    if(mysql_num_rows($result)==1){
        header('Location: bodypanel.php');
        exit();
    }
    else{
        header('Location: bodypanel.html');
        exit();
    }

   }
?>