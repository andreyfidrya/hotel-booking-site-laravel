<x-layouts.admin>

    <h1 class="mb-4">Все Удобства</h1>

    <a href="" 
       class="btn btn-success mb-4">
        Добавить Удобство
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 70%">Название</th>
                <th style="width: 30%">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
                <tr>
                    <td class="text-center align-middle">
                        {{ $facility->name }}
                    </td>

                    <td class="text-center align-middle">
                        <a href="" 
                           class="btn btn-sm btn-primary w-100 mb-2">
                            Редактировать
                        </a>

                        <form action="" 
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


