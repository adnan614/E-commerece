<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<h4>Pages</h4>
				<ul>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="contactus.php">Contact Us</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="customer/my_account.php">My account</a></li>
				</ul>
				<hr>

				<h4>User Section</h4>

				<ul>
					 <?php
                              if(!isset($_SESSION['customer_email'])){
                                echo"<a href='checkout.php'>Login</a>";
                              }else{
                                echo"<a href='customer/my_account.php?my_orders'>My Account</a>";
                              }

                            ?>
					<li><a href="customer_register.php">Register</a></li>

				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
				
			</div>
			<div class="col-sm-6 col-md-3">

				<h4>Top Product Categories</h4>
				<ul>
					<?php
						$get_p_cats="select * from product_categories";
						$run_p_cats=mysqli_query($con,$get_p_cats);
						while ($row_p_cat=mysqli_fetch_array($run_p_cats)) {
							$p_cat_id=$row_p_cat['p_cat_id'];
							$p_cat_title=$row_p_cat['p_cat_title'];
							echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title</a></li>";
						}
						?>
				</ul>
				<hr class="hidden-md hidden-lg">
				
			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Find Us:</h4>
				<p>
					<strong>Asthaonline.com</strong>
					<br>Bashundhara
					<br>Pragati Sharani
					<br>Badda,Dhaka-1229
					<br>asthaonline24@gmail.com
					<br>+88015*********
				</p>
				<a href="contactus.php">Goto contact us page</a>
				<hr class="hidden-md hidden-lg">
				
			</div>
			<div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
				<h4>Get the News</h4>
				<p class="text-muted">
					Subscribe here for getting news
				</p>
				<form action="" method="post">
					<div class="input-group">
						<input type="text" name="email" class="form-control">
						<span class="input-group-btn">
							<input type="submit" class="btn btn-default" value="Subscribe">
						</span>
					</div>
				</form>
				<hr>
				<h4>Stay In Touch</h4>
				<p class="social">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="#"><i class="fa fa-google-plus"></i></a>
				<a href="#"><i class="fa fa-envelope"></i></a>
				</p>
			</div><!--col-md-3 col-sm-6 End-->

			
		</div>
		
	</div>
	
</div>
<div id="copyright"><!--Copyright Section start-->
	<div class="container">
		<div class="col-md-6">
			<p class="pull-left">
				&copy; 2020 Online Shopping Store
			</p>
		</div>
		<div class="col-md-6">
			<p class="pull-right">
				Theme by: <a href="#">Triangle</a>
			</p>
		</div>
		
	</div>
</div><!--Copyright Section End-->	

