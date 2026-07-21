<x-layouts.porto>
    <div class="body">
		<div role="main" class="main">
			<section class="page-header page-header-modern bg-tertiary m-0 py-0">
				<div class="container py-2">
					<div class="row py-3">
						<div class="col-md-12 align-self-center p-static text-center">
							<h1 class="text-light mt-4 mb-0 pb-0 font-weight-bold text-8">Book Now</h1>
							<div class="divider divider-light divider-small my-3 text-center">
								<hr class="mt-2 mx-auto">
							</div>								
						</div>
						<div class="col-md-12 align-self-center">
							<ul class="breadcrumb breadcrumb-light d-block mb-4 text-center">
								<li><a href="#">Home</a></li>
								<li class="active">Book Now</li>
							</ul>
						</div>
					</div>
				</div>
			</section>

			<div class="container py-5">

				<form id="bookForm" action="demo-hotel-book.html" method="POST">
					<div class="row">
						<div class="col-lg-8 mt-0">

							<div class="bg-color-quaternary p-5">

								<h3 class="text-5 mt-0 mb-4 pb-0">Select Room</h3>
								@foreach ($houses as $house)
									<div class="row align-items-center mb-4">
										<div class="col-md-1 text-center">
											<input type="radio" checked="checked" name="bookNowRoom" id="bookNowRoom1" value="">
										</div>
										<div class="col-md-2 text-center">
											<label for="bookNowRoom1" class="d-block">
												<img src="{{ asset('images/houses/featured/' . $house->featured_image) }}" class="img-fluid my-3 my-md-0" alt="">
											</label>
										</div>
										<div class="col-md-9">
											<label for="bookNowRoom1" class="d-block">
												<h5 class="text-transform-none text-4 font-weight-bold mt-2 mb-0">{{$house->name}}</h5>
												<div class="custom-room-suite-info p-relative top-6">
													<ul class="m-0 p-0">
														<li><label>ЦЕНЫ ОТ</label> <strong>{{ $house->housetype->price_on_business_days }}</strong></li>
													</ul>
												</div>
											</label>
										</div>
									</div>								
								@endforeach
							</div>

							<div class="bg-color-quaternary p-5 mt-4">

								<h3 class="text-5 mt-0 mb-4 pt-0 pb-0">Guest Details</h3>

								<div class="row">
									<div class="form-group col mb-4">
										<div class="form-control-custom form-control-custom-dark">
											<input type="text" class="form-control text-3" id="bookNowFullName" name="bookNowFullName" placeholder="Full Name">
										</div>
									</div>	
								</div>

								<div class="row">
									<div class="form-group col mb-4">
										<div class="form-control-custom form-control-custom-dark">
											<input type="text" class="form-control text-3" id="bookNowStreetAdd1" name="bookNowStreetAdd1" placeholder="Street address, P.O. box, company name, c/o">
										</div>
									</div>				
								</div>	

								<div class="row">						
									<div class="form-group col mb-4">
										<div class="form-control-custom form-control-custom-dark">
											<input type="text" class="form-control text-3" id="bookNowStreetAdd2" name="bookNowStreetAdd2" placeholder="Apartment, suite, unit, building, floor, etc.">
										</div>
									</div>	
								</div>

								<div class="row">
									<div class="form-group col mb-4">
										<div class="form-control-custom form-control-custom-dark">
											<input type="text" class="form-control text-3" id="bookNowCity" name="bookNowCity" placeholder="City">
										</div>
									</div>				
								</div>					

								<div class="row">						
									<div class="form-group col mb-4">
										<div class="form-control-custom form-control-custom-dark">
											<select class="form-select form-control text-3" id="bookNowState">
												<option value="">State</option>
												<option value="AL">Alabama</option>
												<option value="AK">Alaska</option>
												<option value="AZ">Arizona</option>
												<option value="AR">Arkansas</option>
												<option value="CA">California</option>
												<option value="CO">Colorado</option>
												<option value="CT">Connecticut</option>
												<option value="DE">Delaware</option>
												<option value="DC">District Of Columbia</option>
												<option value="FL">Florida</option>
												<option value="GA">Georgia</option>
												<option value="HI">Hawaii</option>
												<option value="ID">Idaho</option>
												<option value="IL">Illinois</option>
												<option value="IN">Indiana</option>
												<option value="IA">Iowa</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<option value="LA">Louisiana</option>
												<option value="ME">Maine</option>
												<option value="MD">Maryland</option>
												<option value="MA">Massachusetts</option>
												<option value="MI">Michigan</option>
												<option value="MN">Minnesota</option>
												<option value="MS">Mississippi</option>
												<option value="MO">Missouri</option>
												<option value="MT">Montana</option>
												<option value="NE">Nebraska</option>
												<option value="NV">Nevada</option>
												<option value="NH">New Hampshire</option>
												<option value="NJ">New Jersey</option>
												<option value="NM">New Mexico</option>
												<option value="NY">New York</option>
												<option value="NC">North Carolina</option>
												<option value="ND">North Dakota</option>
												<option value="OH">Ohio</option>
												<option value="OK">Oklahoma</option>
												<option value="OR">Oregon</option>
												<option value="PA">Pennsylvania</option>
												<option value="RI">Rhode Island</option>
												<option value="SC">South Carolina</option>
												<option value="SD">South Dakota</option>
												<option value="TN">Tennessee</option>
												<option value="TX">Texas</option>
												<option value="UT">Utah</option>
												<option value="VT">Vermont</option>
												<option value="VA">Virginia</option>
												<option value="WA">Washington</option>
												<option value="WV">West Virginia</option>
												<option value="WI">Wisconsin</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group col mb-4">
										<div class="form-control-custom form-control-custom-dark">
											<input type="text" class="form-control text-3" id="bookNowCity" name="bookNowZip" placeholder="Zip Code">
										</div>
									</div>				
								</div>	
							</div>

						</div>

						<!-- Sidebar -->
						<div class="col-lg-4 mt-4 mt-lg-0 position-relative">

							<div data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 150}}">
								<div id="bookFormDetails" class="box-shadow-custom bg-quaternary p-5">
									<div class="row">
										<div class="form-group col">
											<h3 class="text-5 mb-4 pb-0">Reservation Details</h3>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<div class="form-control-custom form-control-custom-dark form-control-datepicker-custom">
												<input type="text" value="" class="form-control text-2" data-msg-required="This field is required." placeholder="Arrival" name="bookNowArrival" id="bookNowArrival" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<div class="form-control-custom form-control-custom-dark form-control-datepicker-custom">
												<input type="text" value="" class="form-control text-2" data-msg-required="This field is required." placeholder="Departure" name="bookNowDeparture" id="bookNowDeparture" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<div class="form-control-custom form-control-custom-dark">
												<select class="form-select form-control text-2" name="bookNowAdults" data-msg-required="This field is required." id="bookNowAdults" required>
													<option value="">Adults</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col pb-0 mb-0">
											<div class="form-control-custom form-control-custom-dark">
												<select class="form-select form-control text-2" name="bookNowKids" data-msg-required="This field is required." id="bookNowKids" required>
													<option value="">Kids</option>
													<option value="1">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
											</div>
										</div>
									</div>
								</div>

								<button type="submit" class="btn btn-primary font-weight-bold text-uppercase px-5 py-3 mt-4 mb-2 w-100">Book Now</a>
							</div>

						</div>
					</div>
				</form>

			</div>

			<section class="section section-tertiary section-no-border m-0">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-3 mt-1 pt-2">

							<p class="lead p-0 m-0 text-3 opacity-7 text-uppercase">Sign Up Now For</p>
							<h4 class="mb-1 mt-0 text-light font-weight-bold text-5-5 p-relative bottom-4">Exclusive Special Offers:</h4>

						</div>
						<div class="col-lg-9">

							<div class="alert alert-success d-none" id="newsletterSuccess">
								<strong>Success!</strong> You've been added to our email list.
							</div>

							<div class="alert alert-danger d-none" id="newsletterError"></div>

							<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
								<div class="row">
									<div class="form-group col-md-5">
										<div class="form-control-custom">
											<input type="text" class="form-control form-control-lg py-3 text-2 mt-2" id="newsletterName" placeholder="Full Name *" required>
										</div>
									</div>
									<div class="form-group col-md-4">
										<div class="form-control-custom">
											<input type="email" class="form-control form-control-lg py-3 text-2 mt-2" id="newsletterEmail" placeholder="Email Address *" 
											required>
										</div>
									</div>
									<div class="form-group col-md-3">
										<button type="submit" class="btn btn-primary font-weight-bold text-uppercase py-3 w-100 mt-2">Subscribe Now</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</section>

			<footer id="footer" class="color bg-primary mt-0 py-5">
				<div class="container">
					<div class="row align-items-center my-3">
						<div class="col-lg-3">
							<a href="demo-hotel.html">
								<img alt="Porto" class="img-fluid logo" style="max-width: 122px;" src="img/demos/hotel/logo-footer.png">
							</a>
						</div>
						<div class="col-lg-6">

							<div class="d-lg-flex">
								<div class="my-4 my-lg-0 feature-box feature-box-style-5">
									<div class="feature-box-icon p-0 m-0">
										<i class="icon-phone icons text-color-light text-8"></i>
									</div>
									<div class="feature-box-info p-0 ms-2">
										<label class="text-light opacity-7 d-block line-height-5">CALL US</label>
										<strong class="text-uppercase text-5"><a href="tel:8001234567" class="text-light ws-nowrap">(800) 123-4567</a></strong>
									</div>
								</div>

								<div class="my-4 my-lg-0 feature-box feature-box-style-5 ms-lg-4">
									<div class="feature-box-icon p-0 m-0">
										<i class="icon-location-pin icons text-color-light text-8"></i>
									</div>
									<div class="feature-box-info p-0 ms-2">
										<label class="text-light opacity-7 d-block line-height-5">ADDRESS</label>
										<strong class="text-light text-4 line-height-5">1234 Street Name, Los Angeles - CA<a class="d-block font-weight-bold text-color-light text-uppercase text-1" href="#"><u>Get Directions</u></a></strong>
									</div>
								</div>
							</div>

						</div>
						<div class="col-lg-3 text-lg-end">
							<ul class="header-social-icons social-icons social-icons-clean social-icons-icon-light">
								<li class="social-icons-instagram mx-1"><a href="http://www.instagram.com/" target="_blank" class="text-3" title="Instagram"><i class="fab fa-instagram"></i></a></li>
								<li class="social-icons-twitter mx-1"><a href="http://www.twitter.com/" target="_blank" class="text-3" title="Twitter"><i class="fab fa-twitter"></i></a></li>
								<li class="social-icons-facebook mx-1"><a href="http://www.facebook.com/" target="_blank" class="text-3" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

		</div>

	</div>
</x-layouts.porto>