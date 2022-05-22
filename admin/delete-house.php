<?php

   include('../config/constants.php');

 // echo "deleting";


 if(isset($_GET['id']) && isset($_GET['image_name']))
   {
          //echo "process";
          $id = $_GET['id'];
          $image_name = $_GET['image_name'];


          if($image_name != "")
          {
              $path = "../images/house/".$image_name;


              $remove = unlink($path);

              if($remove==false)
              {
                  $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
                  header('location:'.SITEURL.'admin/manage-house.php');
                  die();
              }
           }

           $sql = "DELETE FROM tbl_food WHERE id=$id";

           $res = mysqli_query($conn, $sql);

          if($res==true)
          {
               $_SESSION['delete'] = "<div class='success'>House Removed Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-house.php');
          }
          else
          {
               $_SESSION['upload'] = "<div class='error'>Failed to Delete House.</div>";
               header('location:'.SITEURL.'admin/manage-house.php');
          }
    }

  else
  {
       //echo "redirect";
       $_SESSION['unauthorize'] = "<div class='error'>Unautharised Access.</div>";
       header('location:'.SITEURL.'admin/manage-house.php');
  }

?>