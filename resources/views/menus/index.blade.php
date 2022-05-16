<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
         style="background-image: url('assets/food.jpg')">
        <h1
            class="font-mono text-3xl font-extrabold text-white md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Наше меню</span>
        </h1>
        <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
            Изучите наше меню и выберите то, что вам особенно по вкусу!
            Вы можете удивить и побаловать ваших близких, закажите любое блюдо нашего ресторана и заберите его во второй половине дня по пути домой.
        </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Список блюд</h1>
            <div class="flex flex-wrap -mx-4 px-20">
                @foreach ($menus as $menu)
                    <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
                        <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('assets/'.$menu->image) }}" alt="Image">
                            </div>
                            <div class="p-4">
                                <h2 class="mt-2 mb-2  font-bold">{{ $menu->name }}</h2>
                                <p class="text-sm">{{ $menu->description }}</p>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <span class="font-bold text-xl">{{ $menu->price }}</span>&nbsp;
                                        <span class="text-sm font-semibold">₽</span>
                                    </div>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>
