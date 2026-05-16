<x-layouts.admin>

    <h1 class="mb-4">Редактировать удобство</h1>

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

    <form action="{{ route('admin.facilities.update', $facility) }}" 
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
                   value="{{ old('name', $facility->name) }}"
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

            <a href="{{ route('admin.facilities.index') }}" 
               class="btn btn-secondary">
                Назад
            </a>
        </div>

    </form>

</x-layouts.admin>