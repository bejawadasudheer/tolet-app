<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
       <h1>Manage House</h1>
       <br /> <br />


                <a href="<?php echo SITEURL; ?>admin/add-house.php" class="btn-primary">Add House</a>
                <br /> <br /> <br />


                <?php
                
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>



                <table class="tbl-full">
                    <tr>
                        <th>S.NO</th>
                        <th>Title</th>
                        <th>Number</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>


                    <?php 
                    
                      $sql = "SELECT * FROM tbl_food";

                      $res = mysqli_query($conn, $sql);

                      $count = mysqli_num_rows($res);

                      $sn=1;

                      if($count>0)
                      {
                         while($row=mysqli_fetch_assoc($res))
                         {
                             $id = $row['id'];
                             $title = $row['title'];
                             $number = $row['number'];
                             $price = $row['price'];
                             $image_name = $row['image_name'];
                             $featured = $row['featured'];
                             $active = $row['active'];

                             ?>


                                <tr>
                                  <td><?php echo $sn++; ?>. </td>
                                  <td><?php echo $title; ?></td>
                                  <td><?php echo $number; ?></td>
                                  <td><?php echo $price; ?>/-</td>
                                  <td>
                                    <?php 
                                      
                                       if($image_name=="")
                                       {
                                           echo "<div class='error'>Image not Added.</div>";
                                       }
                                       else
                                       {
                                           ?>

                                           <img src="<?php echo SITEURL; ?>images/house/<?php echo $image_name; ?>" width="100px">
                                           <?php
                                       }
                                    
                                    ?>
                                  </td>
                                  <td><?php echo $featured; ?></td>
                                  <td><?php echo $active; ?></td>
                                  <td>
                                      <a href="<?php echo SITEURL; ?>admin/update-house.php?id=<?php echo $id; ?>" class="btn-secondary">Update House</a>
                                      <a href="<?php echo SITEURL; ?>admin/delete-house.php?id=<?php echo $id ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete House</a>
                                      
                                   </td>

                                </tr>



                             <?php
                         }
                      }
                      else
                      {
                          echo "<tr> <td colspan='7' class='error'>House not Added Yet.</td></tr>";
                      }
                    
                    ?>



                    
                   
                </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>