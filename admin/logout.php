<?php 

    include('../config/constants.php');

    SESSION_destroy();

    header('location:'.SITEURL.'admin/login.php');

?>