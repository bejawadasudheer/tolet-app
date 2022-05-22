<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
       <h1>Manage Order</h1>
       <br /> <br /> <br>

       <?php 
       
           if(isset($_SESSION['update']))
           {
               echo $_SESSION['update'];
               unset($_SESSION['update']);
           }
       
       ?>
       <br><br>
      



                <table class="tbl-full">
                    <tr>
                        <th>S.NO</th>
                        <th>House</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>

                    </tr>


                    <?php 
                    
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $sn = 1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <th><?php echo $total; ?></th>
                                        <th><?php echo $order_date; ?></th>



                                        <th>
                                            <?php 
                                               if($status=="Ordered")
                                               {
                                                   echo "<label>$status</label>";
                                               }
                                               elseif($status=="On Delivary")
                                               {
                                                echo "<label style='color: orange'>$status</label>";
                                               }
                                               elseif($status=="Delivered")
                                               {
                                                echo "<label style='color: green'>$status</label>";
                                               }
                                               elseif($status=="Cancelled")
                                               {
                                                echo "<label style='color: red'>$status</label>";
                                               }
                                            ?>
                                        </th>



                                        <th><?php echo $customer_name; ?></th>
                                        <th><?php echo $customer_contact; ?></th>
                                        <th><?php echo $customer_email; ?></th>
                                        <th><?php echo $customer_address; ?></th>
                                        
                                        <td>
                                         <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        
                                        </td>
                                    </tr>

                                <?php

                                
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='12' class='error'>Orders are Not Available.</td></tr>"; 
                        }


                    ?>



                    
                   
                </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>