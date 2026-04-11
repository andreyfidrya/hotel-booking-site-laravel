<x-layouts.admin>

    <h1 class="mb-4">Все типы домиков</h1>

    <a href="{{ route('admin.housetypes.create') }}" 
       class="btn btn-success mb-4">
        Добавить тип домиков
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 40%" class="text-center">
                    Название
                </th>
                <th style="width: 30%" class="text-center">
                    Удобства
                </th>
                <th style="width: 30%" class="text-center">
                    Действия
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($housetypes as $housetype)
                <tr>
                    <td class="text-center align-middle">
                        {{ $housetype->name }}
                    </td>

                    <td class="text-center align-middle">
                        @foreach($housetype->facilities as $facility)
                            <span class="badge bg-primary">
                                {{ $facility->name }}
                            </span>
                        @endforeach
                    </td>

                    <td class="text-center align-middle">
                        <a href="{{ route('admin.housetypes.edit', $housetype) }}" 
                           class="btn btn-sm btn-primary w-100 mb-2">
                            Редактировать
                        </a>

                        <form action="{{ route('admin.housetypes.destroy', $housetype) }}" 
                              method="POST"
                              onsubmit="return confirm('Удалить этот тип домика?')">
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


