<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12 bk-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-indigo-400 to-blue-500 hover:text-green-400">Отчет</h1>
            <p class="text-2xl text-blue-500 mb-3">Выберите отрезок</p>
            <form method="POST" action="{{ route('admin.reports.filter') }}">
                @csrf
                <div class="sm:col-span-6">
                    <label for="date_timepicker_start" class="block text-sm font-medium text-gray-700"> Время от </label>
                    <div class="mt-1">
                        <input autocomplete="off" name="date_timepicker_start" id="date_timepicker_start" placeholder="Выберите дату" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    @error('date_timepicker_start')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6 mt-5">
                    <label for="date_timepicker_end" class="block text-sm font-medium text-gray-700"> Время до </label>
                    <div class="mt-1">
                        <input autocomplete="off" name="date_timepicker_end" id="date_timepicker_end" placeholder="Выберите дату" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    @error('date_timepicker_end')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6 p-4">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                        Показать данные
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
