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

				<form id="bookForm" action="{{ route('booking.store') }}" method="POST">
					@csrf
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
											<input type="text" class="form-control text-3" id="bookNowFullName" name="full_name" placeholder="Фамилия Имя Отчество">
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
											<input type="email" class="form-control text-3" id="bookNowStreetAdd2" name="email" placeholder="Адрес электронной почты">
										</div>
									</div>	
								</div>

							</div>

						</div>

						<!-- Sidebar -->
						<div class="col-lg-4 mt-4 mt-lg-0 position-relative">

							<div>
								<div id="bookFormDetails" class="box-shadow-custom bg-quaternary p-5">
									<div class="row">
										<div class="form-group col">
											<h3 class="text-5 mb-4 pb-0">Детали бронирования</h3>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<div class="form-control-custom form-control-custom-dark form-control-datepicker-custom">
												<input type="text" value="" class="form-control text-2" data-msg-required="This field is required." placeholder="Дата заезда" name="arrival_date" id="bookNowArrival" required>
												@error('wrong_date')
													<strong><div class="text-danger">{{ $message }}</div></strong>
												@enderror
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<div class="form-control-custom form-control-custom-dark form-control-datepicker-custom">
												<input type="text" value="" class="form-control text-2" data-msg-required="This field is required." placeholder="Дата выезда" name="departure_date" id="bookNowDeparture" required>
											</div>
										</div>
									</div>
									<div id="date-error-content">
										Заполните параметры бронирования
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
												<select class="form-select form-control text-2" name="adults" data-msg-required="This field is required." id="bookingAdults" required>
													<option value="">Количество взрослых</option>
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
									</div>
									<div class="row">
										<div class="form-group col pb-0 mb-0">
											<div class="form-control-custom form-control-custom-dark">
												<select class="form-select form-control text-2" name="children" data-msg-required="This field is required." id="bookingKids" required>
													<option value="">Количество детей</option>
													<option value="0">0</option>
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
									</div>
									<div class="form-group col pb-0 mb-0">
										<div class="form-check">
											<input
												class="form-check-input"
												type="checkbox"
												id="bookingPets"
												name="pets"
												value="1">

											<label class="form-check-label text-2" for="bookNowPets">
												Проживание с домашним животным (кошка или собака)
											</label>
										</div>
									</div>
								</div>

								<div class="mt-4" id="price-details">
									<h4>Стоимость проживания</h4>

									<div id="price-content">
										Заполните параметры бронирования
									</div>
								</div>

								<button type="submit" class="btn btn-primary font-weight-bold text-uppercase px-5 py-3 mt-4 mb-2 w-100">Забронировать</a>
							</div>							

						</div>
					</div>
				</form>

			</div>			

			

		</div>

	</div>
</x-layouts.porto>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function calculatePrice() {	

		const selectedHouse = document.querySelector('input[name="house_id"]:checked')?.value;
        const arrival = document.getElementById('bookNowArrival').value;
        const departure = document.getElementById('bookNowDeparture').value;
        const adults = document.getElementById('bookingAdults').value;		
        const children = document.getElementById('bookingKids').value;		
        const pets = document.getElementById('bookingPets').checked;		
		
		if (arrival && departure && departure <= arrival) {

        document.getElementById('date-error-content').innerHTML =
            `<div class="alert alert-danger">
                Дата выезда не может быть меньше даты заезда.
            </div>`;

        return;
    	}

		if (!selectedHouse || !arrival || !departure || !adults || children === "") {
			
			document.getElementById('date-error-content').innerHTML = '';

			console.log('Не хватает данных');

			return;
		}		

        fetch('/booking/calculate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                house_id: selectedHouse,
                arrival_date: arrival,
                departure_date: departure,
                adults: adults,
                children: children,
                pets: pets
            })
        })

		.then(async response => {

			const data = await response.json();

			if (!response.ok) {
				throw new Error(data.error);
			}

			return data;
		})
		
		.then(data => {		

		let html = `
			<p><strong>Всего суток:</strong> ${data.total_days}</p>
			<p><strong>Итого:</strong> ${data.total_price} грн</p>
			<hr>
		`;

		data.details.forEach(day => {
			html += `
				<div class="mb-2">
					<strong>${day.date}</strong> (${day.day_type})<br>
					Базовая цена: ${day.base_price} грн<br>
					Доп. взрослые: ${day.extra_adults_price} грн<br>
					Доп. дети: ${day.extra_children_price} грн<br>
					Животные: ${day.pets_price} грн<br>
					<strong>За день: ${day.total_price} грн</strong>
						</div>
						<hr>
					`;
				});

				document.getElementById('price-content').innerHTML = html;
			})
			.catch(error => {

				document.getElementById('price-content').innerHTML =
					`<div class="alert alert-danger">
						${error.message}
					</div>`;

			});
        
    	}

    document.getElementById('bookingAdults').addEventListener('change', function () {    
    calculatePrice();
	});

	document.getElementById('bookingKids').addEventListener('change', function () {		
		calculatePrice();
	});

	document.getElementById('bookingPets').addEventListener('change', calculatePrice);	

	$('#bookNowArrival').on('changeDate', calculatePrice);
	$('#bookNowDeparture').on('changeDate', calculatePrice);

	document.querySelectorAll('input[name="house_id"]').forEach(radio => {
		radio.addEventListener('change', calculatePrice);
	});

	});
</script>