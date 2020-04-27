<div class="box">
	<center>
		<h3>Change your password</h3>
	</center>
	<form action="" method="post"><!-- form Begin -->
	<div class="form-group">
		<label>Enter your current password</label>
		<input type="password" name="old_password" class="form-control">
	</div>
	<div class="form-group">
		<label>Enter New Password</label>
		<input type="password" name="new_password" class="form-control">
	</div>
	<div class="form-group">
		<label>Confirm New Password</label>
		<input type="password" name="c_n_password" class="form-control">
	</div>
	<div class="text-center">
		<button type="submit" name="submit" class="btn btn-primary btn-lg">
			<i class="fa fa-user-md"></i> Update Now
		</button>
	</div>
</div>
</form><!-- form Finish -->



<?php 

if(isset($_POST['submit'])){
    
    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = $_POST['old_password'];
    
    $c_new_pass = $_POST['new_password'];
    
    $c_new_pass_again = $_POST['c_n_password'];
    
    $sel_cutomer = "select * from customers where customer_email='$c_email'";
    
    $run_customer = mysqli_query($con,$sel_cutomer);
    
    $check_customer = mysqli_fetch_array($run_customer);

    $check_c_old_pass=$check_customer['customer_pass'];
    
    if($check_c_old_pass!= $c_old_pass){
        
        echo "<script>alert('Sorry, your current password did not valid. Please try again')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Sorry, your new password did not match')</script>";
        
        exit();
        
    }
    
    $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Your password has been updated')</script>";
        
        echo "<script>window.open('my_account.php?my_order','_self')</script>";
        
    }
    
}

?>