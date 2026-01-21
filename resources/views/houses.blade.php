<x-layouts.porto>			
    <section class="page-header page-header-modern page-header-background parallax overlay overlay-color-dark overlay-show overlay-op-5 m-0 py-0" data-plugin-parallax data-plugin-options="{'speed': 1.2}" data-image-src="{{ asset('img/demos/hotel/backgrounds/background-5.jpg') }}">
					<div class="container py-4">
						<div class="row py-5">
							<div class="col-md-12 align-self-center p-static text-center">
								<h1 class="text-light mt-4 mb-0 pb-0 font-weight-bold text-8">Rooms & Rates</h1>
								<div class="divider divider-primary divider-small my-3 text-center">
									<hr class="mt-2 mx-auto">
								</div>								
							</div>
							<div class="col-md-12 align-self-center">
								<ul class="breadcrumb breadcrumb-light d-block mb-4 text-center">
									<li><a href="#">Home</a></li>
									<li class="active">Rooms & Rates</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-5">

					<div class="row">

						<div class="col">

							<ul class="nav nav-pills nav-pills-center sort-source text-2 text-uppercase mb-4 mt-0" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
								<li class="nav-item active" data-option-value="*"><a class="nav-link text-uppercase font-weight-bold text-3 active" href="#">Show All</a></li>
								<li class="nav-item" data-option-value=".rooms"><a class="nav-link text-uppercase font-weight-bold text-3" href="#">Rooms</a></li>
								<li class="nav-item" data-option-value=".suites"><a class="nav-link text-uppercase font-weight-bold text-3" href="#">Suites</a></li>
							</ul>
						@foreach ($housetypes as $housetype)
							
							<div class="sort-destination-loader sort-destination-loader-showing mb-0">
								<div class="row portfolio-list sort-destination" data-sort-id="portfolio">
							@foreach ($housetype->houses as $house)		

											<div class="col-md-6 col-lg-4 isotope-item mb-0 pb-0 {{ Str::slug($housetype->name) }}">
												
												<img 
													src="{{ asset('storage/' . $house->featured_image) }}" 
													class="img-fluid" 
													alt="{{ $house->name }}"
												>

												<h5 class="text-transform-none text-4 font-weight-bold mt-3 mb-0">
													{{ $house->name }}
												</h5>

												<div class="custom-room-suite-info mb-5 mb-lg-0">
													<ul>
														<li>
															<label>OCCUPANCY</label>
															<span>{{ $housetype->capacity }} persons</span>
														</li>

														<li>
															<label>SIZE</label>
															<span>{{ $housetype->area }} sqm.</span>
														</li>

														<li>
															<label>TYPE</label>
															<span>{{ $housetype->name }}</span>
														</li>

														<li>
															<label>RATES FROM</label>
															<strong>{{ $housetype->price_on_business_days }} ₴</strong>
														</li>

														<li>
															<a href=""
															class="room-suite-info-book">
																Book Now
															</a>
														</li>
													</ul>
												</div>

											</div>
						@endforeach				
								</div>
							</div>
						
							@endforeach
						</div>

					</div>

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
</x-layouts.porto>