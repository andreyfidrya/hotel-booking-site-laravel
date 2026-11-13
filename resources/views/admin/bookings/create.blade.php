<x-layouts.admin>
    @if ($errors->any())
		<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
			<button type="button"
					class="btn-close"
					data-bs-dismiss="alert"
					aria-label="Close"></button>

			<ul class="mb-0 mt-2"
				style="display: inline-block; text-align: left; padding-left: 20px;">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
    <form action="{{ route('admin.bookings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf               
        
        <h3>Обрати будинок</h3>
            @foreach ($houses as $house) 
            <div>                           
                <input type="radio" 
                name="house_id" 
                value="{{ $house->id }}"
                {{ $selectedHouse->id == $house->id ? 'checked' : '' }}
                onchange="window.location.href='{{ route('admin.bookings.create-house', $house->id) }}'">
                {{$house->name}}
            </div>
            @endforeach  
            @error('house_id') <div class="text-danger mt-2"> {{ $message }} </div> @enderror          
        <h3>Подробиці бронювання</h3>
            <div id="date-error-content">
                Вкажіть параметри бронюровання
            </div>								
            <div class="alert alert-light border mt-3 mb-0">
                <i class="fas fa-clock me-2"></i>
                    Заезд: <strong>с 14:00</strong><br>
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Выезд: <strong>до 12:00</strong>
            </div>
            Прізвище Ім'я та Побатькові
            <div class="row">
                <input type="text" 
                name="full_name" 
                placeholder="Прізвище Ім'я та Побатькові"
                value="{{ old('full_name') }}">
            </div>
            @error('full_name') <div class="text-danger mt-2"> {{ $message }} </div> @enderror           
            Телефон
            <div class="row">
                <input type="tel" 
                name="phone" 
                placeholder="+380 XX XXX XX XX"
                value="{{ old('phone') }}">
            </div>
            @error('phone') <div class="text-danger mt-2"> {{ $message }} </div> @enderror            
            Адреса электронної скриньки
            <div class="row mb-3">
                <input type="email" 
                name="email" 
                placeholder="Адреса электронної скриньки"
                value="{{ old('email') }}">
            </div>
            @error('email') <div class="text-danger mt-2"> {{ $message }} </div> @enderror
            
            <div class="row mb-3">      
                <input type="text" 
                    class="form-control text-2" 
                    placeholder="Дата заезда" 
                    name="arrival_date" 
                    id="bookNowArrival">                    
            </div>

            <div class="row mb-3">    
                <input type="text" 
                    class="form-control text-2" 
                    placeholder="Дата выезда" 
                    name="departure_date" 
                    id="bookNowDeparture">                
            </div>

            Кількість дорослих
            <div class="row">
                <select class="form-select form-control text-2" name="adults" id="bookingAdults">
					<option value="">Зробіть свій вибір</option>
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
            Кількість дітей
            <div class="row">
                <select class="form-select form-control text-2" name="children" id="bookingChildren">
					<option value="">Зробіть свій вибір</option>
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
            <div class="row">
				<div class="form-check">
					<input
						class="form-check-input"
						type="checkbox"
                        id="bookingPets"						
						name="pets"
						value="1">

					<label class="form-check-label text-2" for="bookNowPets">
						Проживання с домашніми улюбленцями (кошка або собака)
					</label>
				</div>
		    </div> 
           
            <div class="mt-4" id="price-details">
				<h4>Стоимость проживания</h4>

				<div id="price-content">
					Заполните параметры бронирования
				</div>
			</div>

            <div class="row mb-3">
            <button type="submit" class="btn btn-primary">
                Додати бронювання
            </button>
            
    </form>
</x-layouts.admin>

<script>
$(document).ready(function () {
    $('#bookNowArrival').datepicker({
        autoclose: true,
        startDate: '+1d',
        orientation: 'bottom'
    });

    $('#bookNowDeparture').datepicker({
        autoclose: true,
        startDate: '+2d',
        orientation: 'bottom'
    });
});

document.addEventListener('DOMContentLoaded', function () {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function calculatePrice() {

    const selectedHouse = document.querySelector('input[name="house_id"]:checked')?.value;
    const arrival = document.getElementById('bookNowArrival').value;
    const departure = document.getElementById('bookNowDeparture').value;
    const adults = document.getElementById('bookingAdults').value;		
    const children = document.getElementById('bookingChildren').value;		
    const pets = document.getElementById('bookingPets').check;

    if (arrival && departure && departure <= arrival) {

        document.getElementById('date-error-content').innerHTML =
            `<div class="alert alert-danger">
                Дата виїзду не може бути меньше дати заїзду!
            </div>`;

        return;
    }
    
    if (!selectedHouse || !arrival || !departure || !adults || children === "") {
			
		document.getElementById('date-error-content').innerHTML = 
            `<div class="alert alert-danger">
                Не вистачає данних!
            </div>`;        

		return;
	}

    fetch('booking/calculate', {
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

				document.getElementById('date-error-content').innerHTML =
					`<div class="alert alert-danger">
						${error.message}
					</div>`;

		});

    }

    document.getElementById('bookingChildren').addEventListener('change', function () {    
    calculatePrice();
	});

});
</script>