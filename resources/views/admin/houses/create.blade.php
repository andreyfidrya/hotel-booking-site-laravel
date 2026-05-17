<x-layouts.admin>

    <script>
    function previewGallery(event) {
        const files = event.target.files;
        const container = document.querySelector('#gallery-preview');

        container.innerHTML = ""; // очищаем старые превью

        if (!files.length) return;

        Array.from(files).forEach(file => {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();

            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = "150px";
                img.style.marginRight = "10px";
                img.style.marginTop = "10px";
                img.style.borderRadius = "6px";

                container.appendChild(img);
            };

            reader.readAsDataURL(file);
        });
    }
    </script>

    <h1 class="mb-4">Добавить домик</h1>

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

    <form action="{{ route('admin.houses.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        {{-- Название --}}
        <div class="mb-3">
            <label for="name" class="form-label">Название домика</label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
            >

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Тип домика --}}
        <div class="mb-3">
            <label for="housetype_id" class="form-label">Тип домика</label>

            <select
                name="housetype_id"
                id="housetype_id"
                class="form-select @error('housetype_id') is-invalid @enderror"
            >
                <option value="">Выберите тип</option>

                @foreach ($housetypes as $housetype)
                    <option
                        value="{{ $housetype->id }}"
                        @selected(old('housetype_id') == $housetype->id)
                    >
                        {{ $housetype->name }}
                    </option>
                @endforeach
            </select>

            @error('housetype_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Главное изображение --}}
        <div class="mb-3">
            <label for="featured_image" class="form-label">
                Главное изображение
            </label>

            <input
                type="file"
                name="featured_image"
                id="featured_image"
                class="form-control @error('featured_image') is-invalid @enderror"
            >

            @error('featured_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Галерея --}}
        <div class="mb-4">
            <label for="gallery_images[]" class="form-label">
                Изображения галереи
            </label>

            <input
                type="file"
                name="gallery_images[]"
                id="gallery_images"
                multiple
                class="form-control"
                onchange="previewGallery(event)"
            >            

            @error('gallery_images[]')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div id="gallery-preview" class="d-flex flex-wrap gap-2 mt-2"></div>

        {{-- Кнопка --}}
        <button type="submit" class="btn btn-primary">
            Сохранить
        </button>

    </form>

</x-layouts.admin>


