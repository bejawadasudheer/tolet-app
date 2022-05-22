<?php 
//session_start();

if(isset($_POST['uname']) && 
   isset($_POST['pass'])){

    //include "../db_conn.php";
    include('../config/constants.php');

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=".$uname;
    
    if(empty($uname)){
    	$em = "User name is required";
    	header('location:'.SITEURL.'/logins.php?error=$em&$data');
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header('location:'.SITEURL.'/logins.php?error=$em&$data');
	    exit;
    }else {

    	$sql = "SELECT * FROM users WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$uname]);

      //if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $username =  $user['username'];
          $password =  $user['password'];
          $fname =  $user['fname'];
          $id =  $user['id'];
          if($username === $uname){
             if(password_verify($pass, $password)){
                 $_SESSION['id'] = $id;
                 $_SESSION['fname'] = $fname;

                 header("Location: ../index.php");
                 exit;
             }else {
               $em = "Incorect User name or password";
               header('location:'.SITEURL.'/logins.php?error=$em&$data');
               exit;
            }

          }else {
            $em = "Incorect User name or password";
            header('location:'.SITEURL.'/logins.php?error=$em&$data');
            exit;
         }

      //}else {
         $em = "Incorect User name or password";
         header('location:'.SITEURL.'/logins.php?error=$em&$data');
         exit;
      }
    }


else {
	header('location:'.SITEURL.'/logins.php?error=error');
	exit;
}