<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add House</h1>
        <br><br>
       <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>



        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the House">
                    </td>
                </tr>
                <tr>
                    <td>Number: </td>
                    <td>
                        <input type="phone" name="number">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of your House"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>lat: </td>
                    <td>
                        <input type="text" name="lat" placeholder="lat">
                    </td>
                </tr>
                <tr>
                    <td>long: </td>
                    <td>
                        <input type="text" name="long" placeholder="long">
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">


                             <?php 
                             
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);

                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        $number = $number['number'];

                                        ?>
                                        <option value="<?php echo $id ?>"><?php echo $title; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }

                             ?>


                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add House" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
        ob_start();
          if(isset($_POST['submit']))
          {
             // echo "clicked";

             $title = $_POST['title'];
             $number = $_POST['number'];
             $description = $_POST['description'];
             $lat = $_POST['lat'];
             $long = $_POST['long'];
             ?>
             <!--<iframe width="50%" height="250" src="https://maps.google.com/maps?q=<?php echo $lat; ?>,<?php echo $long; ?>&output=embed"></iframe>-->
             <?php
             $price = $_POST['price'];
             $category = $_POST['category'];

             if(isset($_POST['featured']))
             {
                 $featured = $_POST['featured'];
             }
             else
             {
                 $featured = "No";
             }
             if(isset($_POST['active']))
             {
                 $active = $_POST['active'];
             }
             else
             {
                 $active = "No";
             }
             if(isset($_FILES['image']['name']))
             {
                 $image_name = $_FILES['image']['name'];



                 if($image_name!="")
                 {
                     $ext = end(explode('.', $image_name));

                     $image_name = "House-Name-".rand(0000,9999).".".$ext;


                     $src = $_FILES['image']['tmp_name'];

                     $dst = "../images/house/".$image_name;

                     $upload = move_uploaded_file($src, $dst);


                     if($upload==false)
                     {
                         $_SESSION['upload'] = "<div class='error'>Failed to upload Image</div>";
                         header('location:'.SITEURL.'admin/add-house.php');
                          

                         die();
                     }
                 }
             }
             else
             {
                 $image_name = "";
             }

                $sql2 = "INSERT INTO tbl_food SET
                    title = '$title',
                    number = $number,
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active',
                    lattitude = '$lat',
                    longitude = '$long'
                 
                ";
               $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['add'] = "<div class='success'>House Added successfully.</div>";
                    echo "<div class='success'>Updated Successfully....</div>";
                   // header('location:'.SITEURL.'admin/manage-house.php');
                    //echo"<script>window.location.href='admin/manage-house.php';</script>"; 
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed to add House.</div>";
                    header('location:'.SITEURL.'admin/manage-house.php'); 
                    
                }
           }
        ob_end_flush(); 
        ?>




    </div>
</div>

<?php include('partials/footer.php'); ?>