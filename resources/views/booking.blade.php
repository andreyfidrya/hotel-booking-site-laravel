<x-layouts.porto>
    <div class="body">
		<div role="main" class="main">
			<section class="page-header page-header-modern bg-tertiary m-0 py-0">
				<div class="container py-2">
					<div class="row py-3">
						<div class="col-md-12 align-self-center p-static text-center">
							<h1 class="text-light mt-4 mb-0 pb-0 font-weight-bold text-8">Заказать сейчас</h1>
							<div class="divider divider-light divider-small my-3 text-center">
								<hr class="mt-2 mx-auto">
							</div>								
						</div>
						<div class="col-md-12 align-self-center">
							<ul class="breadcrumb breadcrumb-light d-block mb-4 text-center">
								<li><a href="{{ route('home.index')}}">Главная</a></li>
								<li class="active">Заказать сейчас</li>
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

								<h3 class="text-5 mt-0 mb-4 pb-0">Выбрать домик</h3>
								@foreach ($houses as $house)
									<div class="row align-items-center mb-4">
										<div class="col-md-1 text-center">
											<input type="radio"
													name="house_id"
													value="{{ $house->id }}"
													{{ $selectedHouse->id == $house->id ? 'checked' : '' }}>
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

								<h3 class="text-5 mt-0 mb-4 pt-0 pb-0">Подробности заказа</h3>

								<div class="row">
									<div class="form-group col mb-4">
										<div class="form-control-custom form-control-custom-dark">
											<input type="text" class="form-control text-3" id="bookNowFullName" name="bookNowFullName" placeholder="Фамилия Имя Отчество">
										</div>
									</div>	
								</div>

								<input
								type="tel"
								class="form-control text-3"
								id="phone"
								name="phone"
								placeholder="+380 XX XXX XX XX"
								required>	

								<div class="row">						
									<div class="form-group col mb-4">
										<div class="form-control-custom form-control-custom-dark">
											<input type="email" class="form-control text-3" id="bookNowStreetAdd2" name="bookNowStreetAdd2" placeholder="Адрес электронной почты">
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
											<h3 class="text-5 mb-4 pb-0">Детали бронирования</h3>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<div class="form-control-custom form-control-custom-dark form-control-datepicker-custom">
												<input type="text" value="" class="form-control text-2" data-msg-required="This field is required." placeholder="Дата заезда" name="bookNowArrival" id="bookNowArrival" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<div class="form-control-custom form-control-custom-dark form-control-datepicker-custom">
												<input type="text" value="" class="form-control text-2" data-msg-required="This field is required." placeholder="Дата выезда" name="bookNowDeparture" id="bookNowDeparture" required>
											</div>
										</div>
									</div>
									<div class="alert alert-light border mt-3 mb-0">
										<i class="fas fa-clock me-2"></i>
										Заезд: <strong>с 14:00</strong><br>
										<i class="fas fa-sign-out-alt me-2"></i>
										Выезд: <strong>до 12:00</strong>
									</div>
									<div class="row">
										<div class="form-group col">
											<div class="form-control-custom form-control-custom-dark">
												<select class="form-select form-control text-2" name="bookNowAdults" data-msg-required="This field is required." id="bookNowAdults" required>
													<option value="">Количество взрослых</option>
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
													<option value="">Количество детей</option>
													<option value="1">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group col pb-0 mb-0">
										<div class="form-check">
											<input
												class="form-check-input"
												type="checkbox"
												id="bookNowPets"
												name="pets"
												value="1">

											<label class="form-check-label text-2" for="bookNowPets">
												Проживание с домашним животным (кошка или собака)
											</label>
										</div>
									</div>
								</div>

								<button type="submit" class="btn btn-primary font-weight-bold text-uppercase px-5 py-3 mt-4 mb-2 w-100">Забронировать</a>
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