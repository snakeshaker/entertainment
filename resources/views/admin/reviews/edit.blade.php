<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.reviews.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Вернуться
                </a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.reviews.update',$review->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Имя </label>
                            <div class="mt-1">
                                <input value="{{ $review->name }}" type="text" id="name" name="name" class="@error('name') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="review_text" class="block text-sm font-medium text-gray-700">Текст отзыва</label>
                            <div class="mt-1">
                                <textarea id="review_text" rows="3" name="review_text" class="@error('review_text') border-red-400 @enderror shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    {{ $review->review_text }}
                                </textarea>
                            </div>
                            @error('review_text')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Категория</label>
                            <div class="mt-1">
                                <select id="category_id" name="category_id" class="@error('category_id') border-red-400 @enderror form-multiselect block w-full mt-1">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @selected($review->category_id == $category->id)>
                                            {{ $category->id }} ({{ $category->name }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="review_degree" class="block text-sm font-medium text-gray-700">Вид отзыва</label>
                            <div class="mt-1">
                                <select id="review_degree" name="review_degree" class="@error('review_degree') border-red-400 @enderror form-multiselect block w-full mt-1">
                                    @foreach($degrees as $degree)
                                        <option value="{{ $degree }}" @selected($review->review_degree == $degree)>
                                            {{ $degree }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('review_degree')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
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
