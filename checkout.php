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
     <?php
       if (!isset($_SESSION['customer_email'])) {
          include("customer/customer_login.php");
       }else{

            include("payment_option.php");

       }
       ?>
   </div>
</div>

    <?php

    include("includes/footer.php");
    ?>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>

