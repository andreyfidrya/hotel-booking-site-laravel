<x-layouts.admin>

    <h1 class="mb-4">Редактировать бронирования</h1>

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>

        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.bookings.update', $booking) }}" 
          method="POST">

        @csrf
        @method('PUT')
            
        <div class="mb-3">
            <label for="full_name" class="form-label">
                Гость
            </label>

            <input type="text"
                   id="full_name"
                   name="full_name"
                   class="form-control @error('full_name') is-invalid @enderror"
                   value="{{ old('full_name', $booking->full_name) }}"
                   required>

            @error('full_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">
                Телефон
            </label>

            <input type="tel"
                   id="phone"
                   name="phone"
                   class="form-control @error('phone') is-invalid @enderror"
                   value="{{ old('phone', $booking->phone) }}"
                   required>

            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>        

        <div class="mb-3">
            <label for="email" class="form-label">
                Почта
            </label>

            <input type="email"
                   id="email"
                   name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $booking->email) }}"
                   required>

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>        

        <div class="mb-3">

        <label class="form-label">
            Статус
        </label>
        
        <div>
            @foreach ($statuses as $status)
                <div class="form-check">
                    <input type="radio"                        
                        name="status"
                        value={{$status}}
                        class="form-check-input @error('status') is-invalid @enderror"
                        {{ old('status', $booking->status) === $status ? 'checked' : '' }}>

                    <label for="status_unpaid" class="form-check-label">
                        {{$status}}
                    </label>
                </div>
            @endforeach      

            @error('status')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" 
                    class="btn btn-primary">
                Сохранить
            </button>

            <a href="{{ route('admin.bookings.index') }}" 
               class="btn btn-secondary">
                Назад
            </a>
        </div>

    </form>

</x-layouts.admin>