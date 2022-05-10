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
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">Отзывы</h1>
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
</x-guest-layout>
