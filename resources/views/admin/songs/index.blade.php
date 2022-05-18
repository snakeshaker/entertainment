<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12 bk-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.songs.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Добавить песню
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Исполнитель
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Название песни
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Жанр
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ссылка на видео
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span>Изменить/удалить</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($songs as $song)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $song->singer }}
                            </th>
                            <th class="px-6 py-4">
                                {{ $song->song_name }}
                            </th>
                            <th class="px-6 py-4">
                                {{ $song->genre }}
                            </th>
                            <td class="px-6 py-4 truncate max-w-[200px]">
                                {{ $song->video_link }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.songs.edit', $song->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">
                                        Изменить
                                    </a>
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                          method="POST"
                                          action="{{ route('admin.songs.destroy', $song->id) }}"
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
