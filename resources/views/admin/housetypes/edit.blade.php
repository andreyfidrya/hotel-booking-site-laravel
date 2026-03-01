<x-layouts.admin>

    <h1 class="mb-4">Редактировать тип домиков</h1>
    
    <form action="" 
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">
                Название
            </label>

            <input type="text"
                   id="name"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $housetype->name) }}"
                   required>

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" 
                    class="btn btn-primary">
                Сохранить
            </button>

            <a href="{{ route('admin.housetypes.index') }}" 
               class="btn btn-secondary">
                Назад
            </a>
        </div>

    </form>

</x-layouts.admin>