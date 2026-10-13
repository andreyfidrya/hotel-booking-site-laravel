<x-layouts.admin>
    <form>
        @csrf               
        
        <h3>Обрати будинок</h3>
            @foreach ($houses as $house) 
            <div>                           
                <input type="radio" name="house_id" value="{{ $house->id }}"
                onchange="window.location.href='{{ route('admin.bookings.create', $house) }}'">
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
                <select class="form-select form-control text-2" name="children" data-msg-required="This field is required." id="bookingAdults" required>
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
    </form>
</x-layouts.admin>