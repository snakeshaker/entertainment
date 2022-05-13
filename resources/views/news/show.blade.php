<x-guest-layout>
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <a href="{{ route('news.index') }}" class="hover:text-green-400">< Вернуться</a>
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">{{ $news->news_title }}</h1>
            <p class="text-sm">Дата создания: {{ $news->created_at }}</p>
            <div class="shadow-lg flex flex-wrap lg:w-4/5 mx-auto mt-5">
                <div class="bg-cover bg-bottom border w-full md:w-1/3 h-64 md:h-auto relative" style="background-image:url('{{ asset('assets/'.$news->image) }}')">
                    <div class="absolute text-xl">
                        <i class="fa fa-heart text-white hover:text-red-light ml-4 mt-4 cursor-pointer"></i>
                    </div>
                </div>
                <div class="bg-white w-full md:w-2/3">
                    <div class="h-full mx-auto px-6 md:px-0 md:pt-6 md:-ml-6 relative">
                        <div class="bg-white lg:h-full p-6 -mt-6 md:mt-0 relative mb-4 md:mb-0 flex flex-wrap md:flex-wrap items-center">
                            <div class="w-full">
                                <p class="text-md mt-4 lg:mt-0 md:text-left text-sm">
                                    {{ $news->news_text }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
