<x-layouts.admin>

    <h1 class="mb-4">Добавить удобство</h1>

    <form action="{{ route('admin.facilities.store') }}" 
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

        <div class="d-flex gap-2">
            <button type="submit" 
                    class="btn btn-success">
                Добавить
            </button>

            <a href="{{ route('admin.facilities.index') }}" 
               class="btn btn-secondary">
                Назад
            </a>
        </div>

    </form>

</x-layouts.admin>