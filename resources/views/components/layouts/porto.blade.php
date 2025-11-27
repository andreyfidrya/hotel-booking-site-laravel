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
		.col-lg-4 {
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
											<a
												href="{{ url('/dashboard') }}"
												class="px-3 py-1 border rounded-sm text-sm text-light"
											>
												Dashboard
											</a>
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
														<a class="nav-link font-weight-bold active" href="demo-hotel.html">
															Главная
														</a>
													</li>
													<li>
														<a class="nav-link font-weight-bold" href="demo-hotel-hotel.html">
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
				<div class="slider-container bg-transparent rev_slider_wrapper" style="height: 530px;">
					<div id="revolutionSlider" class="slider rev_slider manual" data-version="5.4.8">
						<ul>
							<li data-transition="boxfade">

								<img src="{{ asset('img/demos/hotel/slides/1.jpg') }}"  
									  alt=""
									  data-bgposition="center bottom"
									  data-bgfit="cover"
									  data-bgrepeat="no-repeat"
									  data-bgparallax="10"
									  class="rev-slidebg"
									  data-no-retina>
							</li>
							<li data-transition="boxfade">

								<img src="{{ asset('img/demos/hotel/slides/2.jpg') }}"  
									  alt=""
									  data-bgposition="center bottom"
									  data-bgfit="cover"
									  data-bgrepeat="no-repeat"
									  data-bgparallax="10"
									  class="rev-slidebg"
									  data-no-retina>
							</li>
							<li data-transition="boxfade">

								<img src="{{ asset('img/demos/hotel/slides/3.jpg') }}"  
									  alt=""
									  data-bgposition="center bottom"
									  data-bgfit="cover"
									  data-bgrepeat="no-repeat"
									  data-bgparallax="10"
									  class="rev-slidebg"
									  data-no-retina>
							</li>
							<li data-transition="boxfade">

								<img src="{{ asset('img/demos/hotel/slides/4.jpg') }}"  
									  alt=""
									  data-bgposition="center bottom"
									  data-bgfit="cover"
									  data-bgrepeat="no-repeat"
									  data-bgparallax="10"
									  class="rev-slidebg"
									  data-no-retina>
							</li>
						</ul>
					</div>
				</div>

				<section class="section section-no-background section-no-border m-0">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">

								<h3 class="mt-4 mb-0 pb-0">Усадьба "Задонецкая дача"</h3>
								<div class="divider divider-primary divider-small my-3">
									<hr class="mt-2 me-auto">
								</div>

								<p class="lead font-weight-regular">Жителям Харькова не нужно ехать далеко, чтобы отдохнуть в выходные дни или во время отпуска. Усадьба «Задонецкая дача» в Коробовых Хуторах, расположенная в 40 км. от Харькова, предлагает отдых и европейский уровень обслуживания своим дорогим гостям.</p>

								<p class="mt-4">Изысканный отдых в Усадьбе в Харьковской области, в соответствии с пожеланиями и предпочтения посетителей, предлагает пять Коричневых домиков площадью 60м2, один Белый домик на 110м2 с баней и бассейном и три Больших домика по 165м2 со своей баней и большой территорией. Все домики с теплыми полами, отоплением, кондиционерами, спутниковым ТВ, интернетом.</p>
								
							</div>
							<div class="col-lg-6">

								<div class="micro-map box-shadow-custom my-4 clearfix">
									<div class="micro-map-map">
										<iframe
											width="100%"
											height="350"
											style="border:0;"
											loading="lazy"
											allowfullscreen
											src="https://www.google.com/maps?q=49.633768,36.34814&hl=ru&z=14&output=embed">
										</iframe>
									</div>
									<div class="micro-map-info">
										<div class="micro-map-info-detail">											
											<div class="address-line">
												<div class="header-extra-info-icon">
													<i class="icon-location-pin icons text-color-primary"></i>
												</div>
												<p class="text-dark text-3 font-weight-bold line-height-5 mb-4">
													Украина, Харьковская обл. Змиевской р-н, с. Задонецкое, Коробов Хутор, ул. Курортная 13б
												</p>
											</div>

											<div class="address-line">
												<div class="header-extra-info-icon">
													<i class="icon-phone icons text-color-primary"></i>
												</div>
												<p class="text-dark text-3 font-weight-bold line-height-5 mb-4">
													+38 (068) 497-98-84
												</p>
											</div>

											<div class="address-line">
												<div class="header-extra-info-icon">
													<i class="icon-envelope icons text-color-primary"></i>
												</div>
												<p class="text-dark text-3 font-weight-bold line-height-5 mb-4">
													dacha.zadonesk@gmail.com
												</p>
											</div>
											
											<div class="address-line">
												<div class="header-extra-info-icon">
													<i class="icon-link icons text-color-primary"></i>
												</div>
												<p class="text-dark text-3 font-weight-bold line-height-5 mb-4">
													<a href="https://www.instagram.com/zadinetska_dacha" target="_blank" rel="noopener noreferrer">
														instagram.com/zadinetska_dacha
													</a>
												</p>
											</div>											
											
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
				</section>				

				<section class="section section-no-background section-no-border m-0">
					<div class="container">
						<div class="row mb-2">
							<div class="col-lg-4">

								<div class="owl-carousel owl-carousel-mini-dots owl-theme dots-inside box-shadow-custom mt-4" data-plugin-options="{'items': 1, 'margin': 10, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 3000}">
									<div>
										<img alt="" class="img-fluid" src="{{ asset('img/demos/hotel/gallery/gallery-1.jpg') }}">
									</div>
									<div>
										<img alt="" class="img-fluid" src="{{ asset('img/demos/hotel/gallery/gallery-2.jpg') }}">
									</div>
								</div>

							</div>
							<div class="col-lg-8">

								<h3 class="mt-4 pt-1 mb-0 pb-0">База отдыха под Харьковом. Садиба «Задонецкая дача»</h3>
								<div class="divider divider-primary divider-small my-3">
									<hr class="mt-2 me-auto">
								</div>

								<p class="mt-4 mb-2">Для всех посетителей усадьбы «Задонецкая дача» в Харьковской области работает бассейн с подогревом с мая по октябрь, где можно окунуться после городской суеты в теплую водичку. Персонал «Задонецкой дачи» всегда заботится об удобствах и комфорте своих гостей. Посетителям предоставляются персональные полотенца, тапочки и средства личной гигиены.</p>

								<p class="mt-4 mb-2">Все домики имеют свою современную кухню с техникой и посудой.</p>
								
								<div class="row mt-4 pt-2">
									<div class="col-lg-4">
										<ul class="list list-icons list-primary text-uppercase font-weight-bold text-color-dark text-2">
											<li><i class="fas fa-check"></i> Домики, деревянные срубы</li>
											<li><i class="fas fa-check"></i> Беседки</li>
											<li><i class="fas fa-check"></i> Мангальные зоны</li>
										</ul>
									</div>
									<div class="col-lg-4">
										<ul class="list list-icons list-primary text-uppercase font-weight-bold text-color-dark text-2">
											<li><i class="fas fa-check"></i> Автостоянка</li>
											<li><i class="fas fa-check"></i> Ресторан</li>
											<li><i class="fas fa-check"></i> Wi-Fi</li>
										</ul>
									</div>
									<div class="col-lg-4">
										<ul class="list list-icons list-primary text-uppercase font-weight-bold text-color-dark text-2">
											<li><i class="fas fa-check"></i> Детская площадка</li>
											<li><i class="fas fa-check"></i> Бассейн с подогревом</li>
											<li><i class="fas fa-check"></i> Баня на дровах</li>
										</ul>
									</div>
								</div>

							</div>

						</div>
					</div>
				</section>
				
				<section class="section section-no-background section-no-border m-0">
					<div class="container">
						<div class="row">
							<div class="col my-3">

								<div class="text-center">
									<h3 class="mb-0 pb-0">Акции и предложения</h3>
									<div class="divider divider-primary divider-small divider-small-center my-3">
										<hr class="mt-2">
									</div>
								</div>

								<div class="row pt-2 pb-3">
									<div class="col-lg-4 mb-4 mb-lg-0">
										<article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
											<div class="card border-0 border-radius-0 box-shadow-1">
												<div class="card-body p-3 z-index-1">
													<a href="demo-hotel-book.html">
														<img class="card-img-top border-radius-0 mb-2" src="img/demos/hotel/blog/blog-1.jpg" alt="Card Image">
													</a>
													<div class="card-body p-0">
														<h4 class="card-title text-5 font-weight-bold pb-1 mt-3 mb-2"><a class="text-color-dark text-decoration-none" href="demo-hotel-book.html">Новий Рік і Різдво</a></h4>
														<p class="card-text mb-2">Чекаємо на Вас на Новий Рік і Різдво в Садибі "Задінецька дача"</p>														
													</div>
												</div>
											</div>
										</article>
									</div>
									<div class="col-lg-4 mb-4 mb-lg-0">
										<article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="150">
											<div class="card border-0 border-radius-0 box-shadow-1">
												<div class="card-body p-3 z-index-1">
													<a href="demo-hotel-book.html">
														<img class="card-img-top border-radius-0 mb-2" src="img/demos/hotel/blog/blog-2.jpg" alt="Card Image">
													</a>
													<div class="card-body p-0">
														<h4 class="card-title text-5 font-weight-bold pb-1 mt-3 mb-2"><a class="text-color-dark text-decoration-none" href="demo-hotel-book.html">Золота Осінь</a></h4>
														<p class="card-text mb-2">АКЦИЯ! С Понедельника по Пятницу (4 дня и 4 ночи) - 4000грн. (экономия 35%). С Пятницы по Понедельник (3 дня и 3 ночи) - 3600грн. (экономия 20%). Цены на праздничные дни уточняйте у администрации."</p>														
													</div>
												</div>
											</div>
										</article>
									</div>
									<div class="col-lg-4 mb-4 mb-lg-0">
										<article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
											<div class="card border-0 border-radius-0 box-shadow-1">
												<div class="card-body p-3 z-index-1">
													<a href="demo-hotel-book.html">
														<img class="card-img-top border-radius-0 mb-2" src="img/demos/hotel/blog/blog-3.jpg" alt="Card Image">
													</a>
													<div class="card-body p-0">
														<h4 class="card-title text-5 font-weight-bold pb-1 mt-3 mb-2"><a class="text-color-dark text-decoration-none" href="demo-hotel-book.html">Золота Осінь</a></h4>
														<p class="card-text mb-2">АКЦИЯ! С Понедельника по Пятницу (4 дня и 4 ночи) - 3000грн. (экономия 25%). С Пятницы по Понедельник (3 дня и 3 ночи) - 2400грн. (экономия 20%). Цены на праздничные дни уточняйте у администрации.</p>														
													</div>
												</div>
											</div>
										</article>
									</div>
								</div>

								<div class="text-center pt-2">
									<a href="demo-hotel-special-offers.html" class="btn btn-primary font-weight-bold text-uppercase px-5 py-3 mt-2 mb-2 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="500">Смотреть все</a>
								</div>

							</div>

						</div>
					</div>
				</section>

				<section class="section section-parallax bg-color-primary border-0 m-0" data-plugin-parallax data-plugin-options="{'speed': 1.1, 'parallaxHeight': '200%'}" data-image-src="img/demos/hotel/backgrounds/background-3.png">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-center">
								<h3 class="mt-4 mb-0 pb-0 text-light">Отзывы</h3>
								<div class="divider divider-light divider-small divider-small-center my-3">
									<hr class="mt-2">
								</div>
							</div>
						</div>
						<div class="row pt-2 px-3">
							<div class="col px-5 mb-4 pb-2">

								<div class="owl-carousel owl-theme nav-style-1 nav-arrows-thin nav-outside nav-light nav-font-size-lg bg-light box-shadow-4 py-5 py-lg-0 mb-0" data-plugin-options="{'responsive': {'0': {'items': 1, 'dots': true}, '768': {'items': 1}, '992': {'items': 1, 'nav': true, 'dots': false}, '1200': {'items': 1, 'nav': true, 'dots': false}}, 'loop': true, 'autoHeight': true}">
									<div class="py-3 py-lg-5 px-lg-5">
										<div class="custom-testimonial-style-1 testimonial testimonial-style-2 testimonial-with-quotes testimonial-remove-right-quote px-0 px-md-4 mx-xl-3 my-3">
											<img width="56" height="56" src="{{ asset('img/demos/hotel/icons/tripadvisor.svg') }}" alt="Tripadvisor Icon" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-dark', 'fadeIn': false}" />
											<blockquote class="pt-3 pb-2 px-0 px-md-3">
												<p class="text-color-dark text-3-5 line-height-8 alternative-font-4 mb-0">Шикарное место. Отличный, доброжелательный персонал и хозяйва. Классные домики. Ухоженная и удобная территория. Тихая и спокойная атмосфера. Хороший бассейн. Можно заказать доставку вкусной домашней еды. Рядом есть рестораны, до центра Змиева 9 мин езды, если надо что-то подкупить, рядом есть магазины. И что самое главное - территория обрабатывается от насекомых и плюс благодаря местоположению не встретили за 4 дня ни одного комара на территории. Недочеты конечно везде можно найти, но мы остались довольны отдыхом, то это самое главное.</p>
											</blockquote>
											<p class="text-color-grey opacity-6">Google - Ноябрь 2021</p>
											<div class="testimonial-author">
												<strong class="font-weight-bold text-4 negative-ls-1">Роман</strong>
											</div>
										</div>
									</div>									
								</div>

							</div>
						</div>
					</div>
				</section>				

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