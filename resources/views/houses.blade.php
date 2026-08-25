<x-layouts.porto>			
    <section class="page-header page-header-modern page-header-background parallax overlay overlay-color-dark overlay-show overlay-op-5 m-0 py-0" data-plugin-parallax data-plugin-options="{'speed': 1.2}" data-image-src="{{ asset('img/demos/hotel/backgrounds/background-5.jpg') }}">
					<div class="container py-4">
						<div class="row py-5">
							<div class="col-md-12 align-self-center p-static text-center">
								<h1 class="text-light mt-4 mb-0 pb-0 font-weight-bold text-8">Домики и цены</h1>
								<div class="divider divider-primary divider-small my-3 text-center">
									<hr class="mt-2 mx-auto">
								</div>								
							</div>
							<div class="col-md-12 align-self-center">
								<ul class="breadcrumb breadcrumb-light d-block mb-4 text-center">
									<li><a href="#">Главная</a></li>
									<li class="active">Домики и цены</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-5">

					<div class="row">

						<div class="col">

							<ul class="nav nav-pills nav-pills-center sort-source text-2 text-uppercase mb-4 mt-0" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
								<li class="nav-item active" data-option-value="*"><a class="nav-link text-uppercase font-weight-bold text-3 active" href="#">Все домики</a></li>
								<li class="nav-item" data-option-value=".rooms"><a class="nav-link text-uppercase font-weight-bold text-3" href="#">4 человек</a></li>
								<li class="nav-item" data-option-value=".suites"><a class="nav-link text-uppercase font-weight-bold text-3" href="#">8 человек</a></li>
								<li class="nav-item" data-option-value=".suites"><a class="nav-link text-uppercase font-weight-bold text-3" href="#">10 человек</a></li>
							</ul>
						@foreach ($housetypes as $housetype)
							
							<div class="sort-destination-loader sort-destination-loader-showing mb-0">
								<div class="row portfolio-list sort-destination" data-sort-id="portfolio">
							@foreach ($housetype->houses as $house)		

									<div class="col-md-6 col-lg-4 isotope-item mb-0 pb-0 {{ Str::slug($housetype->name) }}">
												
										<img 
											src="{{ asset('images/houses/featured/' . $house->featured_image) }}" 
											class="img-fluid house-img" 
											alt="{{ $house->name }}"
											
											data-bgposition="center bottom"
											data-bgfit="cover"
											data-bgrepeat="no-repeat"
											data-bgparallax="10"											
											data-no-retina>											
										

										<h5 class="text-transform-none text-4 font-weight-bold mt-3 mb-0">
											{{ $house->name }}
										</h5>

										<div class="custom-room-suite-info mb-5 mb-lg-0">
											<ul>
												<li>
													<label>Вместимость</label>
													<span>{{ $housetype->capacity }} человек</span>
												</li>

												<li>
													<label>Полощадь</label>
													<span>{{ $housetype->area }} кв.м.</span>
												</li>

												<li>
													<label>Вид</label>
													<span>{{ $housetype->name }}</span>
												</li>

												<li>
													<label>Цена</label>
													<strong>{{ $housetype->price_on_business_days }} Грн</strong>
												</li>

												<li>
													<a href="{{ route('booking.index', $house) }}"
													class="room-suite-info-book">
														Забронировать
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

					
</x-layouts.porto>