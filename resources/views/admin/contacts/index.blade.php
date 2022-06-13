<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.contacts.update', $contacts) }}">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="address" class="block text-sm font-medium text-gray-700"> Наш адрес </label>
                            <div class="mt-1">
                                <input value="{{ $contacts['address'] }}" type="text" id="address" name="address" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="number" class="block text-sm font-medium text-gray-700"> Номер телефона </label>
                            <div class="mt-1">
                                <input value="{{ $contacts['number'] }}" type="text" id="number" name="number" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="email" class="block text-sm font-medium text-gray-700"> Почта </label>
                            <div class="mt-1">
                                <input value="{{ $contacts['email'] }}" type="text" id="email" name="email" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="time1" class="block text-sm font-medium text-gray-700"> График работы </label>
                            <div class="mt-1">
                                <input value="{{ $contacts['time1'] }}" type="text" id="time1" name="time1" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                <input value="{{ $contacts['time2'] }}" type="text" id="time2" name="time2" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="mt-6 p-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                                Обновить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
