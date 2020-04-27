<?php
$active='Cart';
 include("includes/header.php");
?>
         <div id="content">
     <div class="container"> <!--Container Start-->
       <div class="col-md-12"><!--col-md-12 Start-->
          <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li>
              Cart
            </li>
          </ul>         
       </div><!--col-md-12 End-->

       <div id="cart" class="col-md-9">
        <div class="box">
            <form action="cart.php" method="post" enctype="multipart/form-data">
                <h1>Shopping Cart</h1>
                <?php

                
                $ip_add=getUserIp();
                $select_cart="select * from cart where ip_add='$ip_add'";
                $run_cart=mysqli_query($con,$select_cart);
                $count=mysqli_num_rows($run_cart);

                ?>
                <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                 <th colspan="2">Product</th>
                                 <th>Quantity</th>
                                 <th>Unit Price</th>
                                 <th>Size</th>
                                 <th colspan="1">Delete</th>
                                 <th colspan="2">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                    $total = 0;
                  while ($row=mysqli_fetch_array($run_cart)) {
                     $pro_id=$row['p_id'];
                     $pro_size=$row['size'];
                     $pro_qty=$row['qty'];
                     $get_product="select * from products where product_id='$pro_id'";
                     $run_pro=mysqli_query($con,$get_product);
                     while ($row=mysqli_fetch_array($run_pro)) {
                                      
                      $p_title=$row['product_title'];
                      $p_img1=$row['product_img1'];
                      $p_price=$row['product_price'];
                      $sub_total=$row['product_price']*$pro_qty;
                      $total +=$sub_total; 




                                               
                  ?>

                   <tr>
                     <td><img src="admin_area/product_images/<?php echo $p_img1; ?>"></td>
                     <td><a href="details.php?pro_id=<?php echo $pro_id ?>"><?php echo $p_title; ?></a></td>
                     <td><?php echo $pro_qty; ?></td>
                     <td>$<?php echo $p_price; ?></td>
                     <td><?php echo $pro_size; ?></td>
                     <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                     <td>$<?php echo $sub_total; ?></td>
                   </tr>

                    <?php
                       }  }
                    ?>

                          
                        </tbody>
                        
                        
                        <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <th colspan="2">$<?php echo $total; ?></th>
                            </tr>
                        </tfoot>
                        
                    </table>
                    
                </div>
                <div class="box-footer">
                    <div class="pull-left">
                        <a href="index.php" class="btn btn-default">
                            <i class="fa fa-chevron-left"></i>Continue Shopping
                        </a>
                        
                    </div>
                      <div class="pull-right">
                        <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                            <i class="fa fa-refresh"></i>Update Cart
                        </button>
                        <a href="checkout.php" class="btn btn-primary">
                            Procced Checkout <i class="fa fa-chevron-right"></i>
                            
                        </a>
                        
                    </div>
                    
                </div>
                
            </form>
            
        </div>
        <?php
         function update_cart(){
          global $con;
          if(isset($_POST['update'])){
            foreach ($_POST['remove'] as $remove_id) {
                  $delete_product="delete from cart where p_id='$remove_id'";
                  $run_del=mysqli_query($con,$delete_product);
                  if ($run_del) {
                    echo "<script>window.open('cart.php','_self')</script>";
                  }
            }
          }

         }

         echo @$up_cart=update_cart();
         ?>


        ?>
         <div id="row same-height-row"><!--row same-height-Start-->

           <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6-Start-->

             <div class="box same-height headline"><!--box same-height headline Start-->
               <h3 class="text-center">Products You may be Like</h3>
             </div><!--box same-height headline  End-->

           </div><!--col-md-3 col-sm-6 End-->

           <?php 
                 
                  $get_product="select * from products order by rand() LIMIT 0,3";
                    $run_product=mysqli_query($con,$get_product);
                    while ($row=mysqli_fetch_array($run_product)){
                        $pro_id=$row['product_id'];
                        $pro_title=$row['product_title'];
                        $pro_price=$row['product_price'];
                        $pro_img1=$row['product_img1'];
                        echo "
                        <div class='center-responsive col-md-3 col-sm-6'>
                        <div class='product same-height'>
                        <a href='details.php?pro_id=$pro_id'>
                        <img src='admin_area/product_images/$pro_img1' class='img-responsive'> 
                        </a>
                        <div class='text'>
                         <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                         <p class='price'> $$pro_price</p>
                         </div>
                        </div>

                        </div>



                        ";
                    }



           ?>
               
           


      
  </div>

           
</div>
       <div class="col-md-3"><!--col-md-3 Start-->
         <div class="box" id="order-summary">
           <div class="box-header">
              <h3>Order Summary</h3>
           </div>
           <p class="text-muted">
             Shipping And addintional Costs are calculated based on the values you have entered
           </p>
           <div class="table-resposive">
             <table class="table">
             <tr>
               <td>Order Subtotal</td>
               <th>$<?php echo $total; ?></th>
             </tr>
             <tr>
               <td>Shipping and Handlaing</td>
               <th>
                   $0
               </th>
             </tr>
             <tr>
               <td>Tax</td>
               <th> $0</th>
             </tr>
             <tr class="total">
               <td>Total</td>
               <td>
                   $<?php echo $total; ?>
              </td>
             </tr>
           </table>
           </div>
         </div>
       </div><!--col-md-3 end-->

   </div>
</div>

    <?php

    include("includes/footer.php");
    ?>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>