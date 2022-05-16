<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
         style="background-image: url('assets/reviews.jpg')">
        <h1
            class="font-mono text-3xl font-extrabold text-base md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Отзывы</span>
        </h1>
        <div class="mx-auto mt-2 text-base md:text-center lg:text-lg">
            Посмотрите отзывы наших клиентов или оставьте свой
        </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-10 md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Отзывы</h1>
            <div class="mt-5">
                @if (session()->has('success'))
                    <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        <span class="font-medium">{{ session()->get('success') }}</span>
                    </div>
                @endif
            </div>
            @if(\Illuminate\Support\Facades\Auth::user())
            <form class="max-w-xl" method="POST" action="{{ route('reviews.store') }}">
                @csrf
                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700"> Имя </label>
                    <div class="mt-1">
                        <input required value="{{ \Illuminate\Support\Facades\Auth::user()->first_name }}" readonly type="text" id="name" name="name" class="@error('name') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
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
                <div class="sm:col-span-6 pt-2">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Категория</label>
                    <div class="mt-1">
                        <select id="category_id" name="category_id" class="@error('category_id') border-red-400 @enderror form-multiselect block w-full mt-1">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->id }} ({{ $category->name }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class=" mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Оставить отзыв</button>
            </form>
            @else <div><a href="{{ route('register') }}" class="text-green-600 hover:text-green-400">Зарегистрируйтесь,</a> чтобы оставить отзыв</div>
            @endif
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
                                            <div class="bg-orange-600 text-xs uppercase px-2 py-1 rounded-full border border-gray-200 text-gray-200 font-bold">{{ $categories[$review->category_id - 1]->name }}</div>
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
            </div>
        </div>
    </section>
</x-guest-layout>
