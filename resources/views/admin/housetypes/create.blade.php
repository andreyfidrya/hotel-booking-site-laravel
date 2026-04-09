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