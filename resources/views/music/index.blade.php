<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center relative"
         style="background-image: url('{{ asset('assets/music.jpg') }}'); font-family: 'Pacifico'">
        <h1
            class="text-3xl font-extrabold text-white md:text-center sm:leading-none lg:text-5xl z-[2] relative">
            <span class="inline md:block">Каталог песен</span>
        </h1>
        <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-2xl md:text-lg z-[2] relative">
            Все хиты наших времён и вся «классика» в одном флаконе! В нашей фонотеке есть любые мелодии песен на русском языке на ваш выбор.
        </div>
        <div class="w-full h-full absolute top-0 right-0 z-0 backdrop-blur"></div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-10 bg-white md:px-0">
        <h2 class="text-center text-4xl xl:text-5xl text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Каталог песен</h2>
        <div class="container container max-w-4xl m-auto flex flex-wrap flex-col md:flex-row items-center justify-start mt-5">
            <div class="py-6 bk-page">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Исполнитель
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Название песни
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Жанр
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ссылка на видео
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Заказать песню
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($songs as $song)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 music_data">
                                <input type="hidden" value="{{ $song->id }}" class="song_id">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $song->singer }}
                                </th>
                                <th class="px-6 py-4">
                                    {{ $song->song_name }}
                                </th>
                                <th class="px-6 py-4">
                                    {{ $song->genre }}
                                </th>
                                <td class="px-6 py-4 truncate max-w-[200px]">
                                    <a href="{{ $song->video_link }}" target="_blank">
                                        <img src="{{ asset('assets/youtube.svg') }}" alt="" width="32">
                                    </a>
                                </td>
                                <th class="px-6 py-4">
                                    @if(\Illuminate\Support\Facades\Auth::user())
                                    <button class="add-to-cart bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">заказать</button>
                                    @else <div><a href="{{ route('register') }}" class="text-green-600 hover:text-green-400">Зарегистрируйтесь,</a> чтобы зказать песню</div>
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
