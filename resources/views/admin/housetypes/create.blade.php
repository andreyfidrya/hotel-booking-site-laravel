<x-layouts.admin>

    <h1 class="mb-4">Добавить тип домиков</h1>
    
    <form action="{{ route('admin.housetypes.store') }}" 
          method="POST">

        @csrf
        

        <div class="mb-3">
            <label for="name" class="form-label">
                Название
            </label>

            <input type="text"
                   id="name"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}"
                   required>

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> 
        
        <div class="mb-3">
            <label for="description" class="form-label">
                Описание
            </label>

            <textarea
                id="description"
                name="description"
                class="form-control @error('description') is-invalid @enderror"
                rows="4"
            >{{ old('description') }}</textarea>

            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">
                Вместимость
            </label>

            <select name="capacity" 
                    id="capacity"
                    class="form-select @error('capacity') is-invalid @enderror"
                    required>
                
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" 
                        @if(old('capacity') == $i) selected @endif>
                        {{ $i }}
                    </option>
                @endfor

            </select>

            @error('capacity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="area" class="form-label">
                Площадь (м²)
            </label>

            <input type="number"
                id="area"
                name="area"
                class="form-control @error('area') is-invalid @enderror"
                value="{{ old('area') }}"
                min="1"
                step="0.1"
                required>

            @error('area')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price_per_extra_person" class="form-label">
                Цена за дополнительного человека
            </label>

            <input type="number"
                id="price_per_extra_person"
                name="price_per_extra_person"
                class="form-control @error('price_per_extra_person') is-invalid @enderror"
                value="{{ old('price_per_extra_person') }}"
                min="1"
                step="0.1"
                required>

            @error('price_per_extra_person')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price_on_business_days" class="form-label">
                Цена в будни
            </label>

            <input type="number"
                id="price_on_business_days"
                name="price_on_business_days"
                class="form-control @error('price_on_business_days') is-invalid @enderror"
                value="{{ old('price_on_business_days') }}"
                min="1"
                step="0.1"
                required>

            @error('price_per_extra_person')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price_on_weekends" class="form-label">
                Цена на выходных
            </label>

            <input type="number"
                id="price_on_weekends"
                name="price_on_weekends"
                class="form-control @error('price_on_weekends') is-invalid @enderror"
                value="{{ old('price_on_weekends') }}"
                min="1"
                step="0.1"
                required>

            @error('price_per_extra_person')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="facilities" class="form-label">
                Удобства
            </label>

            <select name="facilities[]" 
                    id="facilities"
                    class="form-select @error('facilities') is-invalid @enderror"
                    multiple
                    size="{{ count($facilities) }}">
                
                @foreach($facilities as $facility)
                    <option value="{{ $facility->id }}"
                        @if(collect(old('facilities'))->contains($facility->id)) selected @endif>
                        {{ $facility->name }}
                    </option>
                @endforeach

            </select>

            @error('facilities')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" 
                    class="btn btn-primary">
                Добавить
            </button>

            <a href="{{ route('admin.housetypes.index') }}" 
               class="btn btn-secondary">
                Назад
            </a>
        </div>

    </form>

</x-layouts.admin>