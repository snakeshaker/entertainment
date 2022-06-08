<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12 bk-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.tech-support.export') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white mr-2">
                    Скачать excel таблицу
                </a>
                <a href="{{ route('admin.tech-support.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Создать заявку
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table admin-table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID пользователя
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Номер телефона
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Имя
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ID заявки
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Текст заявки
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
                    @foreach($tech_supports as $tech_support)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $tech_support->user_id }}
                            </th>
                            <th class="px-6 py-4">
                                {{ $tech_support->user->tel_number }}
                            </th>
                            <th class="px-6 py-4">
                                {{ $tech_support->user->first_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $tech_support->id }}
                            </td>
                            <td class="px-6 py-4 max-w-xl truncate">
                                {{ $tech_support->issue }}
                            </td>
                            <td class="px-6 py-4 max-w-xl truncate">
                                {{ $tech_support->created_at }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.tech-support.edit', $tech_support->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">
                                        Изменить
                                    </a>
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                          id="destroy_entry"
                                          method="POST"
                                          action="{{ route('admin.tech-support.destroy', $tech_support->id) }}"
                                          >
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
