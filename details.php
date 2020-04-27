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
              Shop
            </li>
            <li>
              <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php  echo $p_cat_title ?></a>

            </li>
            <li><?php echo $pro_title; ?></li>
          </ul>         
       </div><!--col-md-12 End-->
       <div class="col-md-3">

    <?php

    include("includes/sidebar.php");
    ?>
  </div>
  <div class="col-md-9">
    <div id="productionMain" class="row">
        <div class="col-sm-6">
            <div id="mainImage">
                <div id="mycarousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="mycarousel" daya-slide-to="0" class="active"></li>
                        <li data-target="mycarousel" daya-slide-to="1"></li>
                        <li data-target="mycarousel" daya-slide-to="2"></li>
                        
                    </ol>
                    <div class="carousel-inner"><!--carousel-inner starts-->
                    <div class="item active">
                       <center> <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive"></center>
                        
                    </div>
                    <div class="item">
                        <center> <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive"></center>
                        
                    </div>
                    <div class="item">
                        <center> <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive"></center>
                        
                    </div>
                   
                </div><!--carousel-inner ends-->
                  <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>       

                </a>
                <a href="#mycarousel" class="right carousel-control" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>       

                </a>
                     
                </div>
                
            </div>
            
        </div>
        <div class="col-sm-6">
            <div class="box">
                <h1 class="text-center"><?php echo $pro_title; ?></h1>
                <?php
                 add_cart();

                ?>


                <form action="details.php?add_cart=<?php echo $pro_id; ?>" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label form="" class="col-md-5 control-label">Products Quantity</label>
                        <div class="col-md-7">
                             <select name="product_qty" class="form-control"> 
                       <option>1</option>
                       <option>2</option>
                       <option>3</option>
                       <option>4</option>
                       <option>5</option>
                     </select>

                            
                        </div>
                        
                    </div>
                    <div class="form-group">
                   <label class="col-md-5 control-label">Product Size</label>
                   <div class="col-md-7">
                     <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')">
                      <option disabled selected>Select a size</option>
                      <option>Small</option>
                      <option>Medium</option>
                      <option>Large</option>
                      <option>Extra Large</option>
                     </select>
                   </div>
                 </div>
                 <p class="price text-center"> $<?php echo $pro_price; ?></p>
                 <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart">Add to cart</button></p>
                    
                </form>
                
            </div>
            <div class="row" id="thumbs">
                <div class="col-xs-4">
                    <a href="" class="thumb">
                        <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
                    </a>
                    
                </div>
                 <div class="col-xs-4">
                    <a href="" class="thumb">
                        <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
                    </a>
                    
                </div>
                 <div class="col-xs-4">
                    <a href="" class="thumb">
                        <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
                    </a>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    <div class="box" id="details">
           <h4>Product Details</h4>
           <p> <?php echo $pro_desc; ?> </p>
           <h4>Size</h4>
           <ul>
             <li>Small</li>
             <li>Medium</li>
             <li>Large</li>
             <li>Extra Large</li>
           </ul>
         </div>
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

   </div>
</div>

    <?php

    include("includes/footer.php");
    ?>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>