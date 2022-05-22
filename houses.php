<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div >
            
            <form action="<?php echo SITEURL; ?>house-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for House.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Tolet List</h2>

            <?php 
            
               $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

               $res = mysqli_query($conn, $sql);

               $count = mysqli_num_rows($res);

               if($count>0)
               {
                   while($row=mysqli_fetch_assoc($res))
                   {
                       $id = $row['id'];
                       $title = $row['title'];
                       $description = $row['description'];
                       $price = $row['price'];
                       $number = $row['number'];
                       $image_name = $row['image_name'];
                       $lat = $row['lattitude'];
                       $long = $row['longitude'];

                       ?>
                       <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                   if($image_name=="")
                                   {
                                       echo "<div class='error'>Image not Available.</div>";
                                   }
                                   else
                                   {
                                       ?>
                                       <img src="<?php echo SITEURL; ?>images/house/<?php echo $image_name; ?>" alt="Image Not Displayed" class="img-responsive img-curve">
                                       <?php
                                   }
                                ?>
                                
                            </div>
        
                            <div class="food-menu-desc">
                               <h4><?php echo $title; ?></h4>
                               <p class="one"><?php echo $number; ?></p>
                                <p class="food-price"><?php echo $price; ?>/-</p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                               </p>
                               <br> <br><br>
                               
                               <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                               <a href="https://wa.me/91<?php echo $number; ?>" class="whatsapp_float" target="_blank"><i class="fa fa-whatsapp whatsapp-icon"></i></a>
                               
                               
                               
                            </div>
                            <div class="map">
                               

                                <?php 
                                   if($lat&&$long=="")
                                   {
                                       echo "<div class='error'>Image not Available.</div>";
                                   }
                                   else
                                   {
                                       ?>
                                         <iframe  src="https://maps.google.com/maps?q=<?php echo $lat; ?>,<?php echo $long; ?>&output=embed"></iframe>
                                      
                                       <!--  <iframe><a href="https://maps.google.com/maps?q=<?php echo $lat; ?>,<?php echo $long; ?>&output=embed"></a></iframe> -->
                                       <?php
                                   }
                                ?>
                                
                            </div>
                            
                        </div>
                       <?php
                   }
               }
               else
               {
                   echo "<div class='error'>House not found.</div>";
               }
            
            ?>

            

           

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>