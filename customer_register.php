<?php
$active='Account';
 include("includes/header.php");
?>
         <div id="content">
     <div class="container"> <!--Container Start-->
       <div class="col-md-12"><!--col-md-12 Start-->
          <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li>
              Register
            </li>
          </ul>         
       </div><!--col-md-12 End-->
       <div class="col-md-3">


    <?php

    include("includes/sidebar.php");
    ?>
  </div>

    <div class="col-md-9"><!--col-md-9 Start-->
         <div class="box"><!--box start-->
           <div class="box-header"><!--box header start-->
             <center>
               <h2>Register a new account</h2>
             </center>
           </div><!--box header End-->

           <form action="customer_register.php" method="post" enctype="multipart/form-data">
             <div class="form-group">
               <label>Your Name</label>
               <input type="text" name="c_name" class="form-control" required>
             </div>
             <div class="form-group">
               <label>Your Email</label>
               <input type="text" name="c_email" class="form-control" required>
             </div>

             <div class="form-group">
               <label>Your Password</label>
               <input type="password" name="c_pass" class="form-control" required>
             </div>

             <div class="form-group">
               <label>Your Country</label>
               <input type="text" name="c_country" class="form-control" required>
             </div>

             <div class="form-group">
               <label>Your City</label>
               <input type="text" name="c_city" class="form-control" required>
             </div>

             <div class="form-group">
               <label>Your Contact Number</label>
               <input type="text" name="c_contact" class="form-control" required>
             </div>

             <div class="form-group">
               <label>Your Address</label>
               <input type="text" name="c_address" class="form-control" required>
             </div>

             <div class="form-group">
               <label>Your Profile Picture</label>
               <input type="file" name="c_image" class="form-control" required>
             </div>

             <div class="text-center">
               <button type="submit" name="register" class="btn btn-primary">
                 <i class="fa fa-user-md"></i>Register
               </button>
             </div>
           </form>
         </div><!--box End-->
       </div><!--col-md-9 End-->
   </div>
</div>

    <?php

    include("includes/footer.php");
    ?>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php

if(isset($_POST['register'])){
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_pass = $_POST['c_pass'];
    
    $c_country = $_POST['c_country'];
    
    $c_city = $_POST['c_city'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_address = $_POST['c_address'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    $c_ip = getUserIP();
    
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
    
    $run_customer = mysqli_query($con,$insert_customer);
    
    $sel_cart = "select * from cart where ip_add='$c_ip'";
    
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        
        /// If register have items in cart ///
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('checkout.php','_self')</script>";
        
    }else{
        
        /// If register without items in cart ///
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    
}



?>