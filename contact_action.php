<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
session_start();
$session= new Session();
global $database, $db;
           $file_name = $_FILES['file_up']['name'];

      $name=$_POST['name'];
      $lastname=$_POST['lastname'];
      $email=$_POST['email'];     
      $phone=$_POST['phone'];
      $comment=$_POST['comment'];
$ev_name=$_POST['name'];




    

        

 if(isset($_POST['submit']))
    { 

           $sel="INSERT INTO `".TBL_CONTACT."`( `name`,`phone`,`comment`) VALUES ('".$name."','".$phone."','".$comment."')";
            //echo $sel;exit;
             $result = $database->query( $sel );  
              if ($result) 
            {
             
                $_SESSION['alerts'] = "Your Message will post";
              header("Location:contact-us.php?action=view");   
            }
     }


   if(isset($_GET['status']))
   {
    
      $qry_update="UPDATE `".TBL_BLO."` SET `status`= '".$_GET['status']."' WHERE id='".$_GET['id']."'";

      $result_upload = $database->query( $qry_update ); 
      
            if($result_upload >0)
            {
       $_SESSION['alerts'] = "Update successfully!";
              header("Location:blog.php?action=view");   
      }
   }

   if(isset($_GET['delete']))
   {
    
      $qry_update="DELETE FROM  `".TBL_BLO."` WHERE id='".$_GET['id']."'";

      $result_upload = $database->query( $qry_update ); 
      
            if($result_upload >0)
            {
               $_SESSION['alerts'] = "Update successfully!";
              header("Location:blog.php?action=view");   
      
            }
   }     
      
?>