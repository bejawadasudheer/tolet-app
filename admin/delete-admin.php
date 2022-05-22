<?php
    

    include('../config/constants.php');

    echo $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        //echo "Admin deteted";
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
       // echo "Failed to deleted";
       $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later</div>";
       header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>