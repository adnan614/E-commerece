<div class="box col-md-9"> <!--Box Begain-->
	
	<div class="box-header">
		<center>
			<h1>Login</h1>
			<p class="lead">Already have your Account..?</p>
			<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</center>
	</div>

	<form method="post" action="checkout.php"><!--form begin-->
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="c_email" class="form-control" required="">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" name="c_pass" class="form-control" required="">
			</div>

			<div class="text-center">
				<button name="login" value="Login" class="btn btn-primary">
					<i class="fa fa-sign-in"></i> Login
				</button>
			</div>

	</form><!--form end-->

	<center><!--Center start-->
		
		<a href="customer_register.php">
			<h3>Dont have account..? Register here </h3>
		</a>
	</center><!--Center end-->
</div><!--Box End-->

<?php 

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getUserIp();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('Your email or password is wrong')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart==0){
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('You are Logged in')</script>"; 
        
       echo "<script>window.open('customer/my_account.php?my_order','_self')</script>";
        
    }else{
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('You are Logged in')</script>"; 
        
       echo "<script>window.open('checkout.php','_self')</script>";
        
    }
    
}

?>