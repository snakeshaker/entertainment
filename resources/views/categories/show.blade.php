<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center relative"
         style="background-image: url('{{ asset('assets/'.$category->image) }}'); font-family: 'Pacifico'">
        <h1
            class="text-3xl font-extrabold text-white md:text-center sm:leading-none lg:text-5xl z-[2] relative">
            <span class="inline md:block">{{ $category->name }}</span>
        </h1>
        <div class="mx-auto mt-2 text-green-50 md:text-center md:text-lg lg:text-2xl z-[2] relative">
            {{ $category->description }}
        </div>
        <div class="w-full h-full absolute top-0 right-0 z-0 backdrop-blur"></div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Список мест</h1>
            @if($category->name == 'Караоке-бар')
                <h2 class="mt-2 mb-2 font-bold text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Кликните по столу для бронирования</h2>
                @if(\Illuminate\Support\Facades\Auth::user())
                <div class="flex flex-wrap justify-center overflow-hidden relative karaoke-room border">
                    <div class="mb-10 w-full overflow-hidden bg-green-100 h-20 flex items-center justify-center rounded-lg">
                        <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Бар</h1>
                    </div>
                    <div class="mb-10 w-1/4 overflow-hidden bg-green-100 h-20 flex items-center justify-center rounded-lg absolute -left-[8.1em] top-[50%] window">
                        <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Окно</h1>
                    </div>
                    @foreach ($tables as $table)
                        @if ($table->is_active)
                        <div class="my-2 px-2 w-1/4 overflow-hidden hover:scale-125 hover:cursor-pointer hover:text-blue-400 transition-all add-reservation relative" data-table="{{ $table->id }}" data-max="{{ $table->guest_number }}">
                            <h2 class="mt-2 mb-2 uppercase font-bold md:text-xs text-center">{{ $table->name }}</h2>
                            <p class="text-xs text-green-600 text-center">Стол свободен</p>
                            <div class="rounded-full h-4 w-4 bg-green-500 inline-block absolute top-2 right-20"></div>
                            <img class="mx-auto object-none" src="{{ asset('assets/'.$category->space_image) }}" alt="Table">
                        </div>
                        @else
                            <div class="my-2 px-2 w-1/4 overflow-hidden hover:cursor-pointer hover:text-blue-400 transition-all relative table-blocked">
                                <h2 class="mt-2 mb-2 uppercase font-bold md:text-xs text-center">{{ $table->name }}</h2>
                                <p class="text-xs text-red-600 text-center">Стол недоступен</p>
                                <div class="rounded-full h-4 w-4 bg-red-500 inline-block absolute top-2 right-20"></div>
                                <img class="mx-auto object-none" src="{{ asset('assets/'.$category->space_image) }}" alt="Table">
                            </div>
                        @endif
                    @endforeach
                    <div class="mt-20 w-1/4 overflow-hidden bg-green-100 h-20 flex items-center justify-center rounded-lg">
                        <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Сцена</h1>
                    </div>
                </div>
                @else <div><a href="{{ route('register') }}" class="text-green-600 hover:text-green-400">Зарегистрируйтесь,</a> чтобы забронировать стол</div>
                @endif
            @else
                @if(\Illuminate\Support\Facades\Auth::user())
                <div class="flex flex-wrap -mx-4 px-20">
                    @foreach ($tables as $table)
                        <div class="w-full sm:w-1/2 md:w-1/5 xl:w-1/5 p-4">
                            <div class="c-card block bg-white hover:shadow-xl rounded-lg overflow-hidden">
                                <div class="relative pb-48 overflow-hidden">
                                    <img class="absolute inset-0 mx-auto object-cover" src="{{ asset('assets/'.$category->space_image) }}" alt="Table">
                                </div>
                                <div class="p-4">
                                    <span class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs md:hidden">БРОНИРОВАНИЕ</span>
                                    <h2 class="mt-2 mb-2 uppercase font-bold md:text-xs">{{ $table->name }}</h2>
                                    @if ($table->is_active)
                                        <p class="text-sm inline-block">Стол свободен</p>
                                        <div class="rounded-full h-4 w-4 bg-green-500 inline-block"></div>
                                    @else
                                        <p class="text-sm inline-block">Стол недоступен</p>
                                        <div class="rounded-full h-4 w-4 bg-red-500 inline-block"></div>
                                    @endif
                                </div>
                                <div class="p-4 border-t border-b text-xs text-gray-700">
                                    <h2 class="mt-2 mb-2 uppercase font-bold">Макс. кол-во мест</h2>
                                    <span class="ml-2">{{ $table->guest_number }}</span>
                                </div>
                                <div class="flex justify-center my-2">
                                    @if ($table->is_active)
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded add-reservation md:text-xs" data-table="{{ $table->id }}" data-max="{{ $table->guest_number }}">Забронировать</button>
                                    @else
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded table-blocked md:text-xs" data-table="{{ $table->id }}" data-max="{{ $table->guest_number }}">Забронировать</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else <div><a href="{{ route('register') }}" class="text-green-600 hover:text-green-400">Зарегистрируйтесь,</a> чтобы забронировать место</div>
                @endif
            @endif
        </div>
    </section>
    <section class="px-2 py-10 bg-white md:px-0">
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
            <form class="max-w-xl" method="POST" action="{{ route('categories.store.review') }}">
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
                <input value="{{ $category->id }}" type="text" id="category_id" name="category_id" class="hidden" readonly/>
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
    <div class="py-12 bg-gray-700 transition duration-150 ease-in-out z-10 fixed top-0 right-0 bottom-0 left-0 flex justify-center items-center hidden" id="modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg rounded-lg relative">
            <div class="close-button absolute right-0 top-5 w-10 z-10 hover:cursor-pointer">X</div>
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Забронировать</h1>
                <form>
                    <div class="sm:col-span-6">
                        <h2 class="text-xl text-blue-600">Цена бронирования: {{ $category->res_price }}</h2>
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <label for="guest_number" class="block text-sm font-medium text-gray-700">Число гостей</label>
                        <div class="mt-1">
                            <input type="number" id="guest_number" name="guest_number" min="1" required
                                   class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        <span class="text-xs num-span"></span>
                    </div>
                    <div class="sm:col-span-6 pt-5 hidden res_date">
                        <label for="res_date" class="block text-sm font-medium text-gray-700">Дата бронирования</label>
                        <div class="mt-1">
                            <input autocomplete="off" name="res_date" id="res_date" placeholder="Выберите дату" class="airdatepicker block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        </div>
                        <span class="text-xs reserve-info">Пожалуйста выберите время с 15:00 до 00:00.</span>
                        <span class="text-xs text-red-600 block hidden reserve-err">Это время занято!</span>
                    </div>
                    <input type="hidden" class="table-id" id="table_id" name="table_id">
                    <div class="mt-6 p-4 text-center">
                        <button class="add-to-cart px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-white submit-reserve">
                            Забронировать
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
