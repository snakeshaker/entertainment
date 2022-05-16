<x-guest-layout>
    <section class="px-2 py-10 bg-white md:px-0">
        <h2 class="text-center uppercase text-4xl xl:text-5xl text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Новости</h2>
        <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
        @foreach($news as $new)
            <a href="{{ route('news.show', $new->id) }}">
                <div class="flex flex-col md:flex-row overflow-hidden bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">
                    <div class="h-64 w-auto md:w-1/2">
                        <img class="inset-0 h-full w-full object-cover object-center" src="{{ asset('assets/'.$new ->image) }}" />
                    </div>
                    <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                        <h3 class="font-semibold text-lg leading-tight truncate">{{ $new->news_title }}</h3>
                        <p class="mt-2 max-h-[calc(16rem-100px)] overflow-hidden">
                            {{ $new->news_text }}
                        </p>
                        <div class="flex justify-between">
                            <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                                дата создания: {{ Carbon\Carbon::parse($new->created_at)->format('Y-m-d') }}
                            </p>
                            <p class="hover:text-gray-400">Посмотреть ></p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
            <div class="d-flex justify-content-center mt-4">
                {!! $news->links() !!}
            </div>
        </div>
    </section>
</x-guest-layout>
