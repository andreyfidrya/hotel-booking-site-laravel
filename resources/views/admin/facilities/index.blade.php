<x-layouts.admin>

    <h1 class="mb-4">Все удобства</h1>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button type="button" 
                class="btn-close" 
                data-bs-dismiss="alert">
        </button>
    </div>
    @endif

    <a href="{{ route('admin.facilities.create') }}" 
        class="btn btn-success mb-4">
        Добавить удобство
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 70%" class="text-center">
                    Название
                </th>
                <th style="width: 30%" class="text-center">
                    Действия
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
                <tr>
                    <td class="text-center align-middle">
                        {{ $facility->name }}
                    </td>

                    <td class="text-center align-middle">
                        <a href="{{ route('admin.facilities.edit', $facility) }}" 
                        class="btn btn-sm btn-primary w-100 mb-2">
                            Редактировать
                        </a>

                        <form action="{{ route('admin.facilities.destroy', $facility) }}" 
                            method="POST"
                            onsubmit="return confirm('Удалить это удобство?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" 
                                    class="btn btn-sm btn-danger w-100">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layouts.admin>


