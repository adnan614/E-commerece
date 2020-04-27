<?php
$active='contactus';
 include("includes/header.php");
?>
         <div id="content">
     <div class="container"> <!--Container Start-->
       <div class="col-md-12"><!--col-md-12 Start-->
          <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li>
              Contact Us
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
               <h2>Feel free to Contact Us</h2>
               <p class="text-muted">If your have any questions, please feel free to contact us,our customer service center is working for you 24/7.</p>
             </center>
           </div><!--box header End-->

           <form action="contactus.php" method="post">
             <div class="form-group">
               <label>Name</label>
               <input type="text" name="name" class="form-control" required="">
             </div>
             <div class="form-group">
               <label>Email</label>
               <input type="text" name="email" class="form-control" required="">
             </div>

             <div class="form-group">
               <label>Subject</label>
               <input type="text" name="subject" class="form-control" required="">
             </div>
             <div class="form-group">
               <label>Message</label>
               <textarea class="form-control" name="message"></textarea>
             </div>
             <div class="text-center">
               <button type="submit" name="submit" class="btn btn-primary">
                 <i class="fa fa-user-md"></i>Send Massage
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
             //admin mail
                if(isset($_POST['submit'])){
                 $senderName = $_POST['name'];
                $senderEmail = $_POST['email'];
                $senderSubject = $_POST['subject'];
                $senderMessage = $_POST['message'];
                $receiverEmail="adnanfaruque23@gmail.com";
                mail($receiverEmail,$senderName,$senderSubject,$senderMessage,$senderEmail);

                //customer mail
                  $email = $_POST['email'];
                   $subject = "Welcome To our Shop";
                  $msg = "We shall get you soon,thanks for sending email";
                  $from="adnanfaruque23@gmail.com";
                  mail($email,$subject,$msg,$from);
                   echo "<h2 align='center'>Your message has sent successfully </h2>";

                   }


           ?>