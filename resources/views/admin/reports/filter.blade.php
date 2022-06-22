<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12 bk-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-indigo-400 to-blue-500 hover:text-green-400">Отчет</h1>
            <p class="text-2xl text-blue-500">Отрезок: {{ $from }} - {{ $to }}</p>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reports.export') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white mr-2">
                    Скачать excel таблицу
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table admin-table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Название
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Кол-во бронирований
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Общий доход (₽)
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item">
                                <td class="px-6 py-4">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $counterArr[$loop->index] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $category->res_price * $counterArr[$loop->index] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
