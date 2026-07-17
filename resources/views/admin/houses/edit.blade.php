<x-layouts.admin>

    <script>
    // Хранилище всех выбранных файлов
    let galleryFiles = new DataTransfer();

    function previewGallery(event) {

        const input = event.target;
        const container = document.querySelector('#gallery-preview');

        // Добавляем новые файлы к уже существующим
        Array.from(input.files).forEach(file => {

            if (!file.type.startsWith('image/')) {
                return;
            }

            galleryFiles.items.add(file);

            const reader = new FileReader();

            reader.onload = function(e) {

                const wrapper = document.createElement('div');
                wrapper.style.position = 'relative';

                const img = document.createElement('img');

                img.src = e.target.result;
                img.style.width = '200px';
                img.style.height = '200px';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '6px';

                const removeBtn = document.createElement('button');

                removeBtn.type = 'button';
                removeBtn.innerHTML = '❌';

                removeBtn.className = 'delete-image btn btn-danger btn-sm';

                removeBtn.style.position = 'absolute';
                removeBtn.style.top = '5px';
                removeBtn.style.right = '5px';
                removeBtn.style.width = '30px';
                removeBtn.style.height = '30px';
                removeBtn.style.padding = '0';
                removeBtn.style.borderRadius = '50%';
                removeBtn.style.display = 'flex';
                removeBtn.style.alignItems = 'center';
                removeBtn.style.justifyContent = 'center';

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                container.appendChild(wrapper);

                // удаление
            removeBtn.addEventListener('click', function () {

                // пересобираем DataTransfer без этого файла
                const dt = new DataTransfer();

                Array.from(galleryFiles.files).forEach(f => {
                    if (f !== file) {
                        dt.items.add(f);
                    }
                });

                galleryFiles = dt;

                input.files = galleryFiles.files;

                wrapper.remove();
            });
            };            

            reader.readAsDataURL(file);
        });

        // Обновляем input.files
        input.files = galleryFiles.files;
    }

    document.addEventListener('DOMContentLoaded', function () {

    const featuredInput = document.getElementById('featured_image');
    const featuredPreview = document.getElementById('featured-preview');

    featuredInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            featuredPreview.style.display = 'none';
            featuredPreview.src = '';
            return;
        }

        if (!file.type.startsWith('image/')) {
            featuredPreview.style.display = 'none';
            return;
        }

        const reader = new FileReader();

        reader.onload = function (e) {
            featuredPreview.src = e.target.result;
            featuredPreview.style.display = 'block';
        };

        reader.readAsDataURL(file);
    });

    });
    
    </script>

    <h1 class="mb-4">Редактировать домик {{$house->name}}</h1>
     
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

    <form 
        id="house-form"
        action="{{ route('admin.houses.update', $house) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        {{-- Название --}}
        <div class="mb-3">
            <label for="name" class="form-label">Название домика</label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $house->name) }}"
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
                        @selected(old('housetype_id', $house->housetype_id) == $housetype->id)
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

        <div class="mt-3">
            <img
                id="featured-preview"
                src="{{ asset('images/houses/featured/' . $house->featured_image) }}"
                style="width:200px; height:200px; object-fit:cover; border-radius:6px;"
            >
        </div>

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

            <div id="gallery-preview" class="mb-4 d-flex flex-wrap gap-3">
            @foreach($galleryImages as $image)
                <div style="position:relative;display:inline-block;">
                    <img
                        src="{{ asset('images/houses/gallery/' . $image) }}"
                        style="width:200px;height:200px;object-fit:cover;"
                    >

                    <button
                        type="button"
                        class="delete-image btn btn-danger btn-sm"
                        data-image="{{ $image }}"
                        style="
                            position:absolute;
                            top:5px;
                            right:5px;
                            width:30px;
                            height:30px;
                            padding:0;
                            border-radius:50%;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                        "
                    >
                        ❌
                    </button>
                </div>
            @endforeach
        </div> 

            <input
                type="file"
                name="gallery_images[]"
                id="gallery_images"
                multiple
                class="form-control"
                onchange="previewGallery(event)"
            >            

            @if($errors->has('gallery_images') || $errors->has('gallery_images.*'))
                <div class="text-danger">
                    @foreach($errors->get('gallery_images') as $message)
                        <div>{{ $message }}</div>
                    @endforeach

                    @foreach($errors->get('gallery_images.*') as $messages)
                        @foreach($messages as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    @endforeach
                </div>
            @endif
        </div>               

        {{-- Кнопка --}}
        <button type="submit" class="btn btn-primary">
            Обновить
        </button>

    </form>

    <script>
    
    document.querySelectorAll('.delete-image').forEach(button => {

    button.addEventListener('click', function () {        

        this.closest('div').remove();

        let input = document.createElement('input');

        input.type = 'hidden';
        input.name = 'delete_gallery[]';
        input.value = this.dataset.image;

        document.getElementById('house-form').appendChild(input);

    });

    });
    
    </script>  

</x-layouts.admin>