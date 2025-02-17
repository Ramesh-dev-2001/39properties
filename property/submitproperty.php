<?php        
	require_once("include/layout.php"); 
?>
	<body>
		<div id="page-wrapper">
			<div class="row"> 
				<?php include("include/header.php");?>
				<div class="full-row">
					<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<h2 class="text-secondary double-down-line text-center">Submit Property</h2>
								</div>
							</div>
							<div class="row p-5 bg-white">
								<form method="post" enctype="multipart/form-data">
										<div class="description">
											<h5 class="text-secondary">Basic Information</h5><hr>
												<div class="row">
													<div class="col-xl-12">
														<div class="form-group row">
															<label class="col-lg-2 col-form-label">Title</label>
															<div class="col-lg-9">
																<input type="text" class="form-control" name="title" required placeholder="Enter Title">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-2 col-form-label">Content</label>
															<div class="col-lg-9">
																<textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
															</div>
														</div>
														
													</div>
													<div class="col-xl-6">
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Property Type</label>
															<div class="col-lg-9">
																<select class="form-control" required name="ptype">
																	<option value="">Select Type</option>
																	<option value="apartment">Apartment</option>
																	<option value="flat">Flat</option>
																	<option value="building">Building</option>
																	<option value="house">House</option>
																	<option value="villa">Villa</option>
																	<option value="office">Office</option>
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Selling Type</label>
															<div class="col-lg-9">
																<select class="form-control" required name="stype">
																	<option value="">Select Status</option>
																	<option value="rent">Rent</option>
																	<option value="sale">Sale</option>
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Bathroom</label>
															<div class="col-lg-9">
																<input type="text" class="form-control" name="bath" required placeholder="Enter Bathroom (only no 1 to 10)">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Kitchen</label>
															<div class="col-lg-9">
																<input type="text" class="form-control" name="kitc" required placeholder="Enter Kitchen (only no 1 to 10)">
															</div>
														</div>
														
													</div>   
													<div class="col-xl-6">
														<div class="form-group row mb-3">
															<label class="col-lg-3 col-form-label">BHK</label>
															<div class="col-lg-9">
																<select class="form-control" required name="bhk">
																	<option value="">Select BHK</option>
																	<option value="1 BHK">1 BHK</option>
																	<option value="2 BHK">2 BHK</option>
																	<option value="3 BHK">3 BHK</option>
																	<option value="4 BHK">4 BHK</option>
																	<option value="5 BHK">5 BHK</option>
																	<option value="1,2 BHK">1,2 BHK</option>
																	<option value="2,3 BHK">2,3 BHK</option>
																	<option value="2,3,4 BHK">2,3,4 BHK</option>
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Bedroom</label>
															<div class="col-lg-9">
																<input type="text" class="form-control" name="bed" required placeholder="Enter Bedroom  (only no 1 to 10)">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Balcony</label>
															<div class="col-lg-9">
																<input type="text" class="form-control" name="balc" required placeholder="Enter Balcony  (only no 1 to 10)">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Hall</label>
															<div class="col-lg-9">
																<input type="text" class="form-control" name="hall" required placeholder="Enter Hall  (only no 1 to 10)">
															</div>
														</div>
														
													</div>
												</div>
												<h5 class="text-secondary">Price & Location</h5><hr>
												<div class="row">
													<div class="col-xl-6">
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Floor</label>
															<div class="col-lg-9">
																<select class="form-control" required name="floor">
																	<option value="">Select Floor</option>
																	<option value="1st Floor">1st Floor</option>
																	<option value="2nd Floor">2nd Floor</option>
																	<option value="3rd Floor">3rd Floor</option>
																	<option value="4th Floor">4th Floor</option>
																	<option value="5th Floor">5th Floor</option>
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Price</label>
															<div class="col-lg-9">
																<input type="text" class="form-control" name="price" required placeholder="Enter Price">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">City</label>
															<div class="col-lg-9">
																<input type="text" class="form-control" name="city" required placeholder="Enter City">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">State</label>
															<div class="col-lg-9">
																<input type="text" class="form-control" name="state" required placeholder="Enter State">
															</div>
														</div>
													</div>
													<div class="col-xl-6">
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Total Floor</label>
															<div class="col-lg-9">
																<select class="form-control" required name="totalfl">
																	<option value="">Select Floor</option>
																	<option value="1 Floor">1 Floor</option>
																	<option value="2 Floor">2 Floor</option>
																	<option value="3 Floor">3 Floor</option>
																	<option value="4 Floor">4 Floor</option>
																	<option value="5 Floor">5 Floor</option>
																	<option value="6 Floor">6 Floor</option>
																	<option value="7 Floor">7 Floor</option>
																	<option value="8 Floor">8 Floor</option>
																	<option value="9 Floor">9 Floor</option>
																	<option value="10 Floor">10 Floor</option>
																	<option value="11 Floor">11 Floor</option>
																	<option value="12 Floor">12 Floor</option>
																	<option value="13 Floor">13 Floor</option>
																	<option value="14 Floor">14 Floor</option>
																	<option value="15 Floor">15 Floor</option>
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Area Size</label>
															<div class="col-lg-9">
																<input type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in sqrt)">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Address</label>
															<div class="col-lg-9">
																<input type="text" class="form-control" name="loc" required placeholder="Enter Address">
															</div>
														</div>
														
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Feature</label>
													<div class="col-lg-9">
													<p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p>
													
													<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
														<!---feature area start--->
														<div class="col-md-4">
																<ul>
																<li class="mb-3"><span class="text-secondary font-weight-bold">Property Age : </span>10 Years</li>
																<li class="mb-3"><span class="text-secondary font-weight-bold">Swiming Pool : </span>Yes</li>
																<li class="mb-3"><span class="text-secondary font-weight-bold">Parking : </span>Yes</li>
																<li class="mb-3"><span class="text-secondary font-weight-bold">GYM : </span>Yes</li>
																</ul>
															</div>
															<div class="col-md-4">
																<ul>
																<li class="mb-3"><span class="text-secondary font-weight-bold">Type : </span>Apartment</li>
																<li class="mb-3"><span class="text-secondary font-weight-bold">Security : </span>Yes</li>
																<li class="mb-3"><span class="text-secondary font-weight-bold">Dining Capacity : </span>10 People</li>
																<li class="mb-3"><span class="text-secondary font-weight-bold">Church/Temple  : </span>No</li>
																
																</ul>
															</div>
															<div class="col-md-4">
																<ul>
																<li class="mb-3"><span class="text-secondary font-weight-bold">3rd Party : </span>No</li>
																<li class="mb-3"><span class="text-secondary font-weight-bold">Elevator : </span>Yes</li>
																<li class="mb-3"><span class="text-secondary font-weight-bold">CCTV : </span>Yes</li>
																<li class="mb-3"><span class="text-secondary font-weight-bold">Water Supply : </span>Ground Water / Tank</li>
																</ul>
															</div>
														<!---feature area end---->
													</textarea>
													</div>
												</div>
														
												<h5 class="text-secondary">Image & Status</h5><hr>
												<div class="row">
													<div class="col-xl-6">
														
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Image</label>
															<div class="col-lg-9">
																<input class="form-control" name="aimage" type="file" required="">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Image 2</label>
															<div class="col-lg-9">
																<input class="form-control" name="aimage2" type="file" required="">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Image 4</label>
															<div class="col-lg-9">
																<input class="form-control" name="aimage4" type="file" required="">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Status</label>
															<div class="col-lg-9">
																<select class="form-control"  required name="status">
																	<option value="">Select Status</option>
																	<option value="available">Available</option>
																	<option value="sold out">Sold Out</option>
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
															<div class="col-lg-9">
																<input class="form-control" name="fimage1" type="file">
															</div>
														</div>
													</div>
													<div class="col-xl-6">
														
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Image 1</label>
															<div class="col-lg-9">
																<input class="form-control" name="aimage1" type="file" required="">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">image 3</label>
															<div class="col-lg-9">
																<input class="form-control" name="aimage3" type="file" required="">
															</div>
														</div>
														
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Floor Plan Image</label>
															<div class="col-lg-9">
																<input class="form-control" name="fimage" type="file">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
															<div class="col-lg-9">
																<input class="form-control" name="fimage2" type="file">
															</div>
														</div>
													</div>
												</div>

												<hr>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group row">
															<label class="col-lg-3 col-form-label"><b>Is Featured?</b></label>
															<div class="col-lg-9">
																<select class="form-control" required name="isFeatured">
																	<option value="">Select...</option>
																	<option value="0">No</option>
																	<option value="1">Yes</option>
																</select>
															</div>
														</div>
													</div>
												</div>

												
													<input type="submit" value="Submit Property" class="btn btn-info"name="add" style="margin-left:200px;">
												
										</div>
										</form>
							</div>            
					</div>
				</div>
			<!--	Submit property   -->
				
				
				<?php include("include/footer.php");?>
				<a href="#" class="bg-success text-white hover-text-success" id="scroll"><i class="fas fa-angle-up"></i></a> 
			</div>
		</div>
	</body>
</html>
<!--	Js Link
============================================================--> 
