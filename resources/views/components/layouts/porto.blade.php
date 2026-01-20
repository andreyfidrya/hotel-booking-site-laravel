<!DOCTYPE html>
<html class="sticky-header-reveal">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Задонецкая дача - эко курорт. Усадьба под Харьковом.</title>	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		 <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">		
		<link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('css/theme.css') }}">
		<link rel="stylesheet" href="{{ asset('css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ asset('css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ asset('css/theme-shop.css') }}">

		<!-- Revolution Slider CSS -->
		<link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/settings.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/layers.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/navigation.css') }}">

		<!-- Demo CSS -->
		<link rel="stylesheet" href="{{ asset('css/demos/demo-hotel.css') }}">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="{{ asset('css/skins/skin-hotel.css') }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ asset('vendor/modernizr/modernizr.min.js') }}"></script>

		<style>
        .address-line {
            display: flex;
            align-items: top;
            gap: 10px;
        }

        .address-line p {
            margin: 0;
        }

		.card-img-top {
			height: 450px; /* выбери нужную высоту */
			width: 100%;
			object-fit: cover;      /* обрезает изображение по размеру */
			object-position: bottom; /* выравнивает изображение снизу */
			border-top-left-radius: calc(0.25rem - 1px);
			border-top-right-radius: calc(0.25rem - 1px);
		}

		.row .card {
			height: 100%;
		}
		.card-wrapper {
			display: flex;
		}
    	</style>

	</head>
	<body>

		<div class="body">

			<header id="header" class="header-effect-reveal" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'reveal', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': false, 'stickyStartAt': 220, 'stickySetTop': '-66px'}">
				<div class="header-body border-top-0">
					<div class="header-top header-top-simple-border-bottom bg-color-tertiary">
						<div class="container h-100 px-0">
							<div class="header-row h-100">
								<div class="header-column justify-content-start">
									<div class="header-row">
										<ul class="header-extra-info d-flex align-items-center pt-3 pb-3 ms-0">
											<li class="ms-0">
												<div class="header-extra-info-icon">
													<i class="icon-phone icons text-color-primary"></i>
												</div>
												<div class="header-extra-info-text">													
													<strong class="text-uppercase"><a href="tel:0684979884" class="text-light">+38 (068) 497-98-84</a></strong>
												</div>
											</li>
											<li class="d-none d-md-inline-flex">
												<div class="header-extra-info-icon">
													<i class="icon-location-pin icons text-color-primary"></i>
												</div>
												<div class="header-extra-info-text">													
													<strong class="text-light">вул. Курортна, Задонецьке, Харківська область, Украина, 63436</strong>
												</div>												
											</li>
										</ul>
									</div>
								</div>
								{{-- КНОПКИ АВТОРИЗАЦИИ --}}
								@if (Route::has('login'))
									<nav class="mt-2 d-flex gap-2">
										@auth
											@if(auth()->user()->usertype == 'admin')
												<a href="{{ url('/admin-panel') }}" class="px-3 py-1 border rounded-sm text-sm text-light">
													Админ Панель
												</a>
											@else
												<a href="{{ url('/dashboard') }}" class="px-3 py-1 border rounded-sm text-sm text-light">
													Кабинет
												</a>
											@endif

											<form method="POST" action="{{ route('logout') }}">
												@csrf
												<button
													type="submit"
													class="px-3 py-1 border rounded-sm text-sm text-light bg-transparent border-0"
													style="cursor: pointer;"
												>
													Выход
												</button>
											</form>
										@else
											<a
												href="{{ route('login') }}"
												class="px-3 py-1 border rounded-sm text-sm text-light"
											>
												Вход
											</a>

											@if (Route::has('register'))
												<a
													href="{{ route('register') }}"
													class="px-3 py-1 border rounded-sm text-sm text-light"
												>
													Регистрация
												</a>
											@endif
										@endauth
									</nav>
								@endif
								{{-- /КОНЕЦ КНОПОК --}}
								<div class="header-column justify-content-end">
									<div class="header-row">
										<ul class="header-social-icons social-icons social-icons-clean social-icons-icon-light d-lg-flex m-0 ms-lg-2">
											<li class="social-icons-instagram mx-1"><a href="https://www.instagram.com/zadinetska_dacha/" target="_blank" class="text-3" title="Instagram"><i class="fab fa-instagram"></i></a></li>											
											<li class="social-icons-facebook mx-1"><a href="https://www.facebook.com/160508477643758/" target="_blank" class="text-3" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="demo-hotel.html">
											<img alt="Porto" width="150" height="100" src="{{ asset('img/demos/hotel/logodacha.jpg') }}">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-line header-nav-bottom-line">
										<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li>
														<a class="nav-link font-weight-bold active" href="/">
															Главная
														</a>
													</li>
													<li>
														<a class="nav-link font-weight-bold" href="/houses">
															Домики
														</a>
													</li>
													<li>
														<a class="nav-link font-weight-bold" href="demo-hotel-rooms-rates.html">
															Активиный отдых
														</a>
													</li>
													<li>
														<a class="nav-link font-weight-bold" href="demo-hotel-special-offers.html">
															Ресторан
														</a>
													</li>
													<li>
														<a class="nav-link font-weight-bold" href="demo-hotel-location.html">
															Галерея
														</a>
													</li>
													<li>
														<a class="nav-link font-weight-bold" href="demo-hotel-location.html">
															Цены
														</a>
													</li>
													<li>
														<a class="nav-link font-weight-bold" href="demo-hotel-location.html">
															Контакты
														</a>
													</li>
													<li class="dropdown dropdown-full-color dropdown-primary dropdown-mega dropdown-mega-book-now" id="headerBookNow">
														<a class="nav-link font-weight-bold dropdown-toggle pe-0" href="demo-hotel-book.html">
															<span class="d-block px-lg-4 py-lg-2">Забронировать <i class="fas fa-angle-down d-none d-lg-inline-block ms-2"></i></span>
														</a>
														<ul class="dropdown-menu">
															<li>
																<div class="dropdown-mega-content">
																	<form id="bookFormHeader" action="demo-hotel-book.html" method="POST">
																		<div class="row">
																			<div class="form-group col">
																				<div class="form-control-custom form-control-datepicker-custom">
																					<input type="text" value="" class="form-control text-uppercase text-1 font-weight-semi-bold" data-msg-required="This field is required." placeholder="Дата Заезда" name="bookNowArrivalHeader" id="bookNowArrivalHeader" autocomplete="off" required>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group col">
																				<div class="form-control-custom form-control-datepicker-custom">
																					<input type="text" value="" class="form-control text-uppercase text-1 font-weight-semi-bold" data-msg-required="This field is required." placeholder="Дата Выезда" name="bookNowDepartureHeader" id="bookNowDepartureHeader" autocomplete="off" required>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group col-lg-6">
																				<div class="form-control-custom">
																					<select class="form-select form-control text-uppercase text-1 font-weight-semi-bold" name="bookNowAdults" data-msg-required="This field is required." id="bookNowAdults" required>
																						<option value="">Взрослых</option>
																						<option value="1">1</option>
																						<option value="2">2</option>
																						<option value="3">3</option>
																						<option value="4">4</option>
																						<option value="5">5</option>
																						<option value="6">6</option>
																						<option value="7">7</option>
																						<option value="8">8</option>
																						<option value="9">9</option>
																						<option value="10">10</option>
																					</select>
																				</div>
																			</div>
																			<div class="form-group col-lg-6">
																				<div class="form-control-custom">
																					<select class="form-select form-control text-uppercase text-1 font-weight-semi-bold" name="bookNowKids" data-msg-required="This field is required." id="bookNowKids" required>
																						<option value="">Детей</option>
																						<option value="1">0</option>
																						<option value="1">1</option>
																						<option value="2">2</option>
																						<option value="3">3</option>
																						<option value="4">4</option>
																						<option value="5">5</option>
																						<option value="6">6</option>
																						<option value="7">7</option>
																						<option value="8">8</option>
																						<option value="9">9</option>																																												
																					</select>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group col mb-0 pt-1">
																				<input type="submit" value="Доступные домики" class="btn btn-tertiary btn-lg w-100 mt-2 text-uppercase py-3 text-1 font-weight-semi-bold">
																			</div>
																		</div>
																	</form>
																</div>
															</li>
														</ul>
													</li>
												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main" class="main">
				{{ $slot }}				

				<footer id="footer" class="color bg-primary mt-0 py-5">
					<div class="container">
						<div class="row align-items-center my-3">
							<div class="col-lg-3">
								<a href="demo-hotel.html">
									<img alt="Porto" class="img-fluid logo" style="max-width: 122px;" src="{{ asset('img/demos/hotel/logo-footer.png') }}">
								</a>
							</div>
							<div class="col-lg-6">

								<div class="d-lg-flex">
									<div class="my-4 my-lg-0 feature-box feature-box-style-5">
										<div class="feature-box-icon p-0 m-0">
											<i class="icon-phone icons text-color-light text-8"></i>
										</div>
										<div class="feature-box-info p-0 ms-2">											
											<strong class="text-uppercase text-5"><a href="tel:8001234567" class="text-light ws-nowrap">+38 (068) 497-98-84</a></strong>
										</div>
									</div>

									<div class="my-4 my-lg-0 feature-box feature-box-style-5 ms-lg-4">
										<div class="feature-box-icon p-0 m-0">
											<i class="icon-location-pin icons text-color-light text-8"></i>
										</div>
										<div class="feature-box-info p-0 ms-2">											
											<strong class="text-light text-4 line-height-5">вул. Курортна, Задонецьке, Харківська область, Украина, 63436</strong>
										</div>
									</div>
								</div>

							</div>
							<div class="col-lg-3 text-lg-end">
								<ul class="header-social-icons social-icons social-icons-clean social-icons-icon-light">
									<li class="social-icons-instagram mx-1"><a href="https://www.instagram.com/zadinetska_dacha/" target="_blank" class="text-3" title="Instagram"><i class="fab fa-instagram"></i></a></li>									
									<li class="social-icons-facebook mx-1"><a href="https://www.facebook.com/160508477643758/" target="_blank" class="text-3" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</footer>

			</div>

		</div>

		<div class="footer-copyright bg-tertiary pt-3 pb-5">
			<div class="container">
				<div class="row">					
					<div class="col-lg-6 text-center text-lg-end">
						<p class="text-2 m-0 p-relative bottom-2">© Copyright 2021. All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</div>

		<!-- Vendor -->
		<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('vendor/jquery.appear/jquery.appear.min.js') }}"></script>
		<script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
		<script src="{{ asset('vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('vendor/jquery.validation/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
		<script src="{{ asset('vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
		<script src="{{ asset('vendor/lazysizes/lazysizes.min.js') }}"></script>
		<script src="{{ asset('vendor/isotope/jquery.isotope.min.js') }}"></script>
		<script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('vendor/vide/jquery.vide.min.js') }}"></script>
		<script src="{{ asset('vendor/vivus/vivus.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('js/theme.js') }}"></script>

		<!-- Revolution Slider Scripts -->
		<script src="{{ asset('vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
		<script src="{{ asset('vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{ asset('js/views/view.contact.js') }}"></script>

		<!-- Demo -->
		<script src="{{ asset('js/demos/demo-hotel.js') }}"></script>

		<!-- Theme Custom -->
		<script src="{{ asset('js/custom.js') }}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ asset('js/theme.init.js') }}"></script>
		
	</body>
</html>