<?php 

if(isset($_POST['fname']) && 
   isset($_POST['uname']) && 
   isset($_POST['pass'])){

    //include "../db_conn.php";
    include('../config/constants.php');

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($fname)) {
    	$em = "Full name is required";
    	header('Location: ../indexs.php?error=$em&$data');
	    exit;
    }else if(empty($uname)){
    	$em = "User name is required";
    	header("location:'.SITEURL'../indexs.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header("location:'.SITEURL'../indexs.php?error=$em&$data");
	    exit;
    }else {

    	// hashing the password
    	//$pass = password_hash($pass, PASSWORD_DEFAULT);

    	$sql = "INSERT INTO users(fname, username, password) 
    	        VALUES(?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$fname, $uname, $pass]);

    	header("location:'.SITEURL' ../indexs.php?success=Your account has been created successfully");
	    exit;
    }


}else {
	header("location:'.SITEURL' ../indexs.php?error=error");
	exit;
}