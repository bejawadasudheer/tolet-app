   <?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div>
            
            <form action="<?php echo SITEURL; ?>house-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for House.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

            

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <!--<p>Click the button to get your coordinates.</p>-->

    <!---<button onclick="getLocation()">Try It</button>-->

    <!---<p id="demo"></p> -->

    <script>
    var x = document.getElementById("demo");

    function getLocation() {
      if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
       x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
     x.innerHTML = "Latitude: " + position.coords.latitude + 
     "<br>Longitude: " + position.coords.longitude;
    }
    </script>


    <?php 
       if(isset($_SESSION['order']))
       {
           echo $_SESSION['order'];
           unset($_SESSION['order']);
       }
    
    
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Houses</h2>

            <?php 
            
                 $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";

                 $res = mysqli_query($conn, $sql);

                 $count = mysqli_num_rows($res);

                 if($count>0)
                 {
                     while($row=mysqli_fetch_assoc($res))
                     {
                         $id = $row['id'];
                         $title = $row['title'];
                         $image_name = $row['image_name'];
                         ?>
                         <a href="<?php echo SITEURL; ?>category-house.php?category_id=<?php echo $id; ?>">
                              <div class="box-3 float-container">
                                  <?php
                                  
                                      if($image_name=="")
                                      {
                                          echo "<div class='error'>Image Not Available.</div>";
                                      }
                                      else
                                      {
                                          ?>
                                          <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="House" class="img-responsive img-curve">
                                          <?php
                                      }
                                  
                                  ?>
                                  
                
                                  <h3 class="float-text text-white"><?php echo $title; ?></h3>
                             </div>
                         </a>

                         <?php
                     }
                 }
                 else
                 {
                     echo "<div class='error'>Category not Added.</div>";
                 }
            
            ?>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Houses</h2>



            <?php

            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);

            if($count2>0)
            {
                while($row=mysqli_fetch_assoc($res2))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $number = $row['number'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    $lat = $row['lattitude'];
                    $long = $row['longitude'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image not available.</div>";
                            }
                            else
                            {
                                ?>
                                 <img src="<?php echo SITEURL; ?>images/house/<?php echo $image_name; ?>" alt="Image" class="img-responsive img-curve">
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
                            <br><br><br>
                            
                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            <a href="https://wa.me/91<?php echo $number; ?>" class="whatsapp_float" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
                            
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
                echo "<div class='error'>Food not Available.</div>";

            }

            ?>




            
   


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL; ?>houses.php">Want To See More....</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('partials-front/footer.php'); ?>
    