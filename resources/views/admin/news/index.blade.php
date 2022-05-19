<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12 bk-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.news.export') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white mr-2">
                    Скачать excel таблицу
                </a>
                <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Создать новость
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Заголовок
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Картинка
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Текст новости
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Дата создания
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span>Изменить/удалить</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $new)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $new->news_title }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <img src="{{ asset('assets/'.$new->image) }}" alt="Image" class="w-16 h-16 rounded">
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap max-w-xs truncate">
                                    {{ $new->news_text }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $new->created_at }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.news.edit', $new->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">
                                            Изменить
                                        </a>
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                              method="POST"
                                              action="{{ route('admin.news.destroy', $new->id) }}"
                                              onsubmit="return confirm('Вы уверены?')">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit">Удалить</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
