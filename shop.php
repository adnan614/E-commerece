<?php
$active='Shop';
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
          </ul>         
       </div><!--col-md-12 End-->
       <div class="col-md-3">

    <?php

     include("includes/sidebar.php");

    ?>
  </div>
   <div class="col-md-9">

    <?php
    if(!isset($_GET['p_cat'])){

       if(!isset($_GET['cat'])){

    echo "
       <div class='box'>
        <h1>Shop</h1>
        <p>
            Everythings you can get in one place.
        </p>
           
       </div>

       ";
          }

     }

       ?>
       <div class="row">
        <?php
         if(!isset($_GET['p_cat'])){

         if(!isset($_GET['cat'])){

           $per_page=4;
           if(isset($_GET['page'])){

            $page = $_GET['page'];

            }else{
                $page=1;

                }
        
             
            $start_from = ($page-1) * $per_page;
            $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
            $run_products = mysqli_query($con,$get_products);

            while($row_product=mysqli_fetch_array($run_products)){
                $pro_id=$row_product['product_id'];
                $pro_title=$row_product['product_title'];
                $pro_price=$row_product['product_price'];
                $pro_img1=$row_product['product_img1'];

                echo "
                        <div class='col-md-3 col-sm-6 center responsive'>
                        <div  class='product'>
                              <a href='details.php?pro_id=$pro_id'> 

                               <img src='admin_area/product_images/$pro_img1' class='img-responsive'>

                              </a>
                              <div class='text'>

                                 <h3>
                                     <a href='details.php?pro_id=$pro_id'>$pro_title</a>

                                 </h3>

                                 <p class='price'>

                                     $pro_price
                                 </p>

                                 <p class='buttons'>
                                     
                                   <a  class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                      
                                      View Details 

                                   </a>
                                    <a  class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                      
                                      <i class='fa fa-shopping-cart'></i> Add to Cart

                                   </a>
                                 </p>

                              </div>

                        </div>

                        </div>

                ";

            

           }

        ?>
           
       </div>
       <center>
           <ul class="pagination">
           <?php


              $query="select * from products";
              $result=mysqli_query($con,$query);
              $total_record=mysqli_num_rows($result);
              $total_pages=ceil($total_record/$per_page);

              echo "<li><a href='shop.php?page=1'>".'First Page'."</a></li>
  

              ";
              for($i=1;$i<=$total_pages;$i++){
                 echo "<li><a href='shop.php?page=".$i."'>".$i."</a></li>


              ";
              };

        echo "<li><a href='shop.php?page=$total_pages'>".'Last Page'."</a></li>";
                 

            }
        }

           ?>
           </ul>
       </center>
       <div class="row">
        <?php

        getpcatpro();

        getcatpro();

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