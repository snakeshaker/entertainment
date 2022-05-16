<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
         style="background-image: url('assets/media_entertainment.png')">
        <h1
            class="font-mono text-3xl font-extrabold text-white md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Развлечения</span>
        </h1>
        <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
            Развлечения - эта шелуха праздников. Есть обычай оформлять особые дни отказом от будничных забот, специальной пищей,
            особыми видами физической и интеллектуальной активности итд. Когда люди лишены праздников, они создают себе развлечения
            - все то же самое, еда, праздность, забавы, только без смыслового наполнения.
        </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Список развлечений</h1>
            <div class="flex flex-wrap -mx-4 px-20">
                @foreach ($categories as $category)
                    <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
                        <a href="{{ route('categories.show', $category->id) }}" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('assets/'.$category->image) }}" alt="Image">
                            </div>
                            <div class="p-4">
                                <span class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">БРОНИРОВАНИЕ</span>
                                <h2 class="mt-2 mb-2 uppercase font-bold">{{ $category->name }}</h2>
                                <p class="text-sm">{{ $category->description }}</p>
                            </div>
                            <div class="p-4 border-t border-b text-xs text-gray-700">
                                <span class="ml-2">
                                    {{ $category->reviews->count() }} отзыв(-а/-ов)
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>
