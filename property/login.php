<?php        
	require_once("include/layout.php"); 
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
									<h1>Login</h1>
									<p class="account-subtitle">Access to our dashboard</p>
									<!-- Form -->
									<form method="post" action="<?php echo API_URL; ?>/user.php"> 
										<input type="hidden" name="type" id="type" value="userLogin">
										<?php if(isset($_GET['access']) && $_GET['access'] !==''){ ?>
											<div class="form-group" style="color:red;">Email/Password Incorrect</div>
										<?php } ?>
										<div class="form-group">
											<input type="email"  name="email" class="form-control" placeholder="Your Email*" required>
										</div>
										<div class="form-group">
											<input type="password" name="pwd"  class="form-control" placeholder="Your Password" required>
										</div>
										<button class="btn btn-success" name="login" value="Login" type="submit">Login</button>
									</form>
									<div class="login-or">
										<span class="or-line"></span>
										<span class="span-or">or</span>
									</div>
									<div class="text-center dont-have">Don't have an account? <a href="<?php echo PROPERTY_URL;?>/register.php">Register</a></div>
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
