<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
         style="background-image: url('{{ asset('assets/'.$category->image) }}')">
        <h1
            class="font-mono text-3xl font-extrabold text-white md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">{{ $category->name }}</span>
        </h1>
        <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
            {{ $category->description }}
        </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">Список мест</h1>
            <div class="flex flex-wrap -mx-4 px-20">
                @foreach ($tables as $table)
                    <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
                        <div class="c-card block bg-white hover:shadow-xl rounded-lg overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 mx-auto object-cover" src="{{ asset('assets/'.$category->space_image) }}" alt="Table">
                            </div>
                            <div class="p-4">
                                <span class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">БРОНИРОВАНИЕ</span>
                                <h2 class="mt-2 mb-2 uppercase font-bold">{{ $table->name }}</h2>
                                <p class="text-sm inline-block">Статус: {{ $table->status }}</p>
                                @if ($table->status == 'Свободен')
                                    <div class="rounded-full h-4 w-4 bg-green-500 inline-block"></div>
                                @elseif($table->status == 'Ожидание')
                                    <div class="rounded-full h-4 w-4 bg-yellow-500 inline-block"></div>
                                @else
                                    <div class="rounded-full h-4 w-4 bg-red-500 inline-block"></div>
                                @endif
                            </div>
                            <div class="p-4 border-t border-b text-xs text-gray-700">
                                <h2 class="mt-2 mb-2 uppercase font-bold">Макс. кол-во мест</h2>
                                <span class="ml-2">{{ $table->guest_number }}</span>
                            </div>
                            <div class="flex justify-center my-2">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Забронировать</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="px-2 py-10 bg-blue-100 md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">Отзывы</h1>
            <form class="max-w-xl" method="POST" action="{{ route('categories.store.review') }}">
                @csrf
                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700"> Имя </label>
                    <div class="mt-1">
                        @if(\Illuminate\Support\Facades\Auth::user())
                        <input required value="{{ \Illuminate\Support\Facades\Auth::user()->first_name }}" readonly type="text" id="name" name="name" class="@error('name') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        @else <input required value="Гость" type="text" id="name" name="name" class="@error('name') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        @endif
                    </div>
                    @error('name')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6 pt-2">
                    <label for="review_text" class="block text-sm font-medium text-gray-700">Текст отзыва</label>
                    <div class="mt-1">
                        <textarea required id="review_text" rows="3" name="review_text" class="@error('review_text') border-red-400 @enderror shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    @error('review_text')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6 pt-2">
                    <label for="review_degree" class="block text-sm font-medium text-gray-700">Вид отзыва</label>
                    <div class="mt-1">
                        <select id="review_degree" name="review_degree" class="@error('review_degree') border-red-400 @enderror form-multiselect block w-full mt-1">
                            @foreach($degrees as $degree)
                                <option value="{{ $degree }}">
                                    {{ $degree }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('review_degree')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <input value="{{ $category->id }}" type="text" id="category_id" name="category_id" class="hidden" readonly/>
                <button type="submit" class=" mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Оставить отзыв</button>
            </form>
            <div class="w-full">
                @foreach ($reviews as $review)
                    <div class="flex flex-col bg-white shadow-lg rounded-lg overflow-hidden mt-5">
                        @if($review->review_degree == 'Положительный')
                        <div class="flex justify-between items-center bg-green-200 text-gray-700 text-lg px-6 py-4">
                        @elseif($review->review_degree == 'Отрицательный')
                        <div class="flex justify-between items-center bg-red-200 text-gray-700 text-lg px-6 py-4">
                        @else <div class="flex justify-between items-center bg-yellow-200 text-gray-700 text-lg px-6 py-4">
                        @endif
                            <div>{{ $review->review_degree }}</div>
                            <div>{{ $review->name }}</div>
                        </div>
                        <div class="flex justify-between items-center px-6 py-4">
                            <div class="bg-orange-600 text-xs uppercase px-2 py-1 rounded-full border border-gray-200 text-gray-200 font-bold">{{ $category->name }}</div>
                            <div class="text-sm">{{ $review->created_at }}</div>
                        </div>

                        <div class="px-6 py-4 border-t border-gray-200">
                            <div class="border rounded-lg p-4 bg-gray-200">
                                {{ $review->review_text }}
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center mt-4">
                    {!! $reviews->links() !!}
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
