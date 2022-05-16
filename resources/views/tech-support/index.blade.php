<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left md:max-w-none md:text-center bg-green-100">
        <h1
            class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Техническая поддержка</span>
        </h1>
        <div class="mx-auto mt-2 md:text-center lg:text-lg text-[#16a34a]">
            Столкнулись с проблемой? Не беда! Оставьте заявку и мы рассмотрим её в ближайшее время!
        </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-10 md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">
                Опишите вашу проблему
            </h1>
            @if(\Illuminate\Support\Facades\Auth::user())
            <form method="POST" action="{{ route('tech-support.store') }}">
                @csrf
                <div class="sm:col-span-6">
                    <label for="issue" class="block text-sm font-medium text-gray-700">Текст заявки</label>
                    <div class="mt-1">
                        <textarea id="issue" rows="3" name="issue" class="@error('issue') border-red-400 @enderror shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    @error('issue')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6">
                    <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Отправить заявку
                    </button>
                </div>
            </form>
            @else <div><a href="{{ route('register') }}" class="text-green-600 hover:text-green-400">Зарегистрируйтесь,</a> чтобы оставить заявку</div>
            @endif
            <div class="mt-5">
                @if (session()->has('success'))
                    <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        <span class="font-medium">{{ session()->get('success') }}</span>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-guest-layout>
