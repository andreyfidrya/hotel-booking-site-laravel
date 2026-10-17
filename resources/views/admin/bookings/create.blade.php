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
        <h3>Подробиці бронювання</h3>
            Прізвище Ім'я та Побатькові
            <div class="row">
                <input type="text" name="full_name" placeholder="Прізвище Ім'я та Побатькові">
            </div>
            Телефон
            <div class="row">
                <input type="tel" name="phone" placeholder="+380 XX XXX XX XX">
            </div>
            Адреса электронної скриньки
            <div class="row">
                <input type="email" name="email" placeholder="Адреса электронної скриньки">
            </div>
            Кількість дорослих
            <div class="row">
                <select class="form-select form-control text-2" name="adults" data-msg-required="This field is required." id="bookingAdults" required>
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
                <select class="form-select form-control text-2" name="children" data-msg-required="This field is required." id="bookingChildren" required>
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
            <div class="row">
				<div class="form-check">
					<input
						class="form-check-input"
						type="checkbox"						
						name="pets"
						value="1">

					<label class="form-check-label text-2" for="bookNowPets">
						Проживання с домашніми улюбленцями (кошка або собака)
					</label>
				</div>
		    </div>
             
            <div class="row mb-3">      
                <input type="text" 
                    class="form-control text-2" 
                    placeholder="Дата заезда" 
                    name="arrival_date" 
                    id="bookNowArrival" 
                    required>                    
            </div>

            <div class="row mb-3">    
                <input type="text" 
                    class="form-control text-2" 
                    placeholder="Дата выезда" 
                    name="departure_date" 
                    id="bookNowDeparture" 
                    required>                
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
</script>