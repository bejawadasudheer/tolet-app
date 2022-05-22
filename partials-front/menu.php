<?php include('config/constants.php'); ?>



<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/xhtml">
    <meta charset="UTF-8">
    <meta name="tolet" content="tolet app for who are searching for their rooms,houses,restaurents">
    <meta name="keywords" content="TOLET, tolet, rooms, house, near rooms, near houses, srkr, SRKR, Rooms, Houses, to, To, let, Let, bhimavaram, Bhimavaram, rent">
    <meta name="author" content="sudheer bezawada">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#000">
    <base target="_parent">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="images/logoss.png">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logoss.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
            

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>houses.php">Tolet</a>
                    </li>
                    <li>
                        <a href="indexs.php">Login</a>
                    </li>
                    
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->