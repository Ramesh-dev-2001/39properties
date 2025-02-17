
<?php        
	require_once("include/layout.php"); 
?>
<body>
	<div id="page-wrapper">
		<div class="row"> 

			<?php 
				include("include/header.php");
			?>

			<div class="full-row">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 mb-5 bg-secondary">
							<div class="contact-info">
								<h3 class="mb-4 mt-4 text-white">Contacts</h3>
								
								<ul>
									<li class="d-flex mb-4"> <i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i>
										<div class="contact-address">
											<h5 class="text-white">Address</h5>
											<span class="text-white">Flot no 203, Rali nilayam, Near Krishna kanth park, Madura nagar, Hyderabad.</span><br>
											</div>
									</li>
									<li class="d-flex mb-4"> <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
										<div class="contact-address">
											<h5 class="text-white">Call Us</h5>
											<span class="text-white">+91 728-807-7799</span>
										</div>
									</li>
									<li class="d-flex mb-4"> <i class="fas fa-envelope text-white mr-2 font-13 mt-1"></i>
										<div class="contact-address">
											<h5 class="text-white">Email Address</h5>
											<span class="d-table text-white">info@39properties.com</span>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-1"></div>
						<div class="col-md-12 col-lg-7">
							<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<h2 class="text-secondary double-down-line text-center mb-5">Get In Touch</h2>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<form class="w-100" action="/" method="post">
										<div class="row">
											<div class="row mb-4">
												<div class="form-group col-lg-6">
													<input type="text"  name="name" class="form-control" placeholder="Your Name*" required>
												</div>
												<div class="form-group col-lg-6">
													<input type="text"  name="email" class="form-control" placeholder="Email Address*" required>
												</div>
												<div class="form-group col-lg-6">
													<input type="text"  name="mobile" class="form-control" placeholder="Mobile" maxlength="10">
												</div>
												<div class="form-group col-lg-6">
													<input type="text" name="subject"  class="form-control" placeholder="Subject">
												</div>
												<div class="col-lg-12">
													<div class="form-group">
														<textarea name="message" class="form-control" rows="5" placeholder="Type Comments..."></textarea>
													</div>
												</div>
											</div>
											<button type="submit" class="btn btn-success">Send Message</button>
										</div>
									</form>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!--	Map -->
			<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3806.45508153911!2d78.42959547516608!3d17.437919483457836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTfCsDI2JzE2LjUiTiA3OMKwMjUnNTUuOCJF!5e0!3m2!1sen!2sin!4v1728554457717!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<!--	Map -->
			 
			<?php 
				include("include/footer.php");
			?>
			
			<a href="#" class="bg-success text-white hover-text-success" id="scroll"><i class="fas fa-angle-up"></i></a> 
		</div>
	</div>
	</body>
</html>