<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Вернуться
                </a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('admin.menus.update', $menu->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Название </label>
                            <div class="mt-1">
                                <input value="{{ $menu->name }}" type="text" id="name" name="name" class="@error('name') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 mt-5">
                            <label for="is_active" class="block text-sm font-medium text-gray-700"> Активность </label>
                            <div class="mt-1">
                                <input type="checkbox" name="is_active" value="{{ $menu->is_active }}" {{ $menu->is_active ? 'checked' : ''}} id="is_active"/>
                            </div>
                            @error('is_active')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 mt-5">
                            <label for="image" class="block text-sm font-medium text-gray-700"> Картинка </label>
                            <div>
                                <img src="{{ asset('assets/'.$menu->image) }}" alt="Image" class="w-32 h-32">
                            </div>
                            <div class="mt-1">
                                <input type="file" id="image" name="image" class="@error('image') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('image')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="price" class="block text-sm font-medium text-gray-700">Цена</label>
                            <div class="mt-1">
                                <input value="{{ $menu->price }}" type="number" id="price" min="0.00" max="10000.00" step="0.01" name="price"
                                       class="@error('price') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('price')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
                            <div class="mt-1">
                                <textarea id="description" rows="3" name="description" class="@error('description') border-red-400 @enderror shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    {{ $menu->description }}
                                </textarea>
                            </div>
                            @error('description')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="categories" class="block text-sm font-medium text-gray-700">Категории блюд</label>
                            <div class="mt-1">
                                <select id="categories" name="categories[]" class="form-multiselect block w-full mt-1"
                                        multiple>
                                    @foreach ($foodCategories as $foodCategory)
                                        <option value="{{ $foodCategory->id }}" @selected($menu->food_categories->contains($foodCategory))>
                                            {{ $foodCategory->name }}</option>
                                    @endforeach
                                </select>
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
