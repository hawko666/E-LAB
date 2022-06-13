<?php
session_start();
 include 'conn.php';
 if (isset($_GET['bid'])) {

                  $upid=$_GET['bid'];
                   $sql = "SELECT * FROM book where bid=$upid";
                      $result = mysqli_query($con,$sql);
                      $row=mysqli_fetch_row($result);
                      }
/* $sid=$_SESSION['update'];

  if (isset($sid)) 
  {
      $query="select * from hall where hallid=$sid";
      $res=mysqli_query($con,$query);
      $row=mysqli_fetch_array($res);

} */

 if(isset($_POST['update']))
   {
        $name =$_POST['hname'];
        $address =$_POST['address'];
        $services =$_POST['services'];
        $parkingspace =$_POST['parkingspace'];
        $email =$_POST['email'];
        $contact =$_POST['cnum'];
        $capacity =$_POST['capacity'];
        $charges =$_POST['charge'];
        
         $photo =  addslashes(file_get_contents($_FILES['file']['tmp_name']));
        
        $uid= $_SESSION['uid'];
      
        $result = mysqli_query($con,"UPDATE `hall` SET `name`=$name,`address`=$address,`services`=$services,`parkingspace`=$parkingspace,`emailid`=$email,`contactNo`=$contact,`capacity`=$capacity,`charge`=$charges,`icon`=$photo WHERE hallid= $upid ") ;
           header("Location : managerhalls.php");
   }

 

?>