<?php        
	require_once("include/layout.php"); 
	$type = 'add_user';
?>
	<body>
		<div id="page-wrapper">
			<div class="row"> 
				<?php 
					include("include/header.php");
				?>
				<div class="page-wrappers login-body full-row bg-gray">
					<div class="login-wrapper">
						<div class="container">
							<div class="loginbox">
								<div class="login-right">
									<div class="login-right-wrap">
										<h1>Register</h1>
										<p class="account-subtitle">Access to our dashboard</p>
										<!-- Form -->
										<form class="w-100" action="<?php echo API_URL;?>/user.php" method="post">
										<input type="hidden" id="type" name="type" value="<?php echo $type;?>">
											<div class="form-group">
												<input type="text"  name="name" class="form-control" placeholder="Your Name*" required>
											</div>
											<div class="form-group">
												<input type="email"  name="email" class="form-control" placeholder="Your Email*" required>
											</div>
											<div class="form-group">
												<input type="text"  name="mobile" class="form-control" placeholder="Your Phone*" maxlength="10" required>
											</div>
											<div class="form-group">
												<input type="password" name="pwd"  class="form-control" placeholder="Your Password*" required>
											</div>
											<button class="btn btn-success" value="Register" type="submit">Register</button>
										</form>
										
										<div class="login-or">
											<span class="or-line"></span>
											<span class="span-or">or</span>
										</div>
										<div class="text-center dont-have">Already have an account? <a href="<?php echo PROPERTY_URL;?>/login.php">Login</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 
					include("include/footer.php");
				?>
				<a href="#" class="bg-success text-white hover-text-success" id="scroll"><i class="fas fa-angle-up"></i></a> 
			</div>
		</div>
	</body>
</html>