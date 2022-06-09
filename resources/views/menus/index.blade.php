<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center relative"
         style="background-image: url('{{ asset('assets/food.jpg') }}'); font-family: 'Pacifico'">
        <h1
            class="text-3xl font-extrabold text-white md:text-center sm:leading-none lg:text-5xl z-[2] relative">
            <span class="inline md:block">Наше меню</span>
        </h1>
        <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-2xl md:text-lg z-[2] relative">
            Изучите наше меню и выберите то, что вам особенно по вкусу!
            Вы можете удивить и побаловать ваших близких, закажите любое блюдо нашего ресторана и заберите его во второй половине дня по пути домой.
        </div>
        <div class="w-full h-full absolute top-0 right-0 z-0 backdrop-blur"></div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Список блюд</h1>
            <a href="{{ route('menus.index') }}" type="button"
               class="bg-green-400 hover:bg-green-600 text-white text-sm px-4 py-2  border rounded-full">
                Все блюда
            </a>
            @foreach($foodCategories as $foodCategory)
                <a href="{{ route('menus.show',$foodCategory->id) }}" type="button"
                   class="bg-blue-400 hover:bg-green-400 text-white text-sm px-4 py-2  border rounded-full">
                    {{ $foodCategory->name }}
                </a>
            @endforeach
            <div class="flex flex-wrap -mx-4 px-20">
                @foreach ($menus as $menu)
                    <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4 menu_data">
                        <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                            <input type="hidden" value="{{ $menu->id }}" class="menu_id">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('assets/'.$menu->image) }}" alt="Image">
                            </div>
                            <div class="p-4">
                                    @foreach($menu->food_categories as $category)
                                        <span class="inline-block px-2 py-1 leading-none bg-blue-100 text-indigo-500 rounded-full font-semibold uppercase tracking-wide text-xs">
                                            {{ $category->name }}
                                        </span>
                                    @endforeach
                                <h2 class="mt-2 mb-2  font-bold">{{ $menu->name }}</h2>
                                <p class="text-sm">{{ $menu->description }}</p>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <span class="font-bold text-xl">{{ $menu->price }}</span>&nbsp;
                                        <span class="text-sm font-semibold">₽</span>
                                    </div>
                                    <button class="add-to-cart bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>
