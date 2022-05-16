<x-guest-layout>
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <a href="{{ route('news.index') }}" class="hover:text-green-400">< Вернуться</a>
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">{{ $news->news_title }}</h1>
            <p class="text-sm">Дата создания: {{ $news->created_at }}</p>
            <div class="w-full md:w-1/2 p-4 mx-auto">
                <div class="p-6 rounded-lg">
                    <img class="rounded w-full object-cover object-center mb-6" src="{{ asset('assets/'.$news->image) }}" alt="">
                </div>
            </div>
            <h2 class="font-medium leading-tight text-xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Текст новости:</h2>
            <p class="leading-relaxed text-base">{{ $news->news_text }}</p>
        </div>
    </section>
</x-guest-layout>
