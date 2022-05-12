<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left md:max-w-none md:text-center bg-green-100">
        <h1
            class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Развлекательный центр</span>
        </h1>
        <div class="mx-auto mt-2 md:text-center lg:text-lg text-[#16a34a]">
            Добро пожаловать! Ознакомьтесь с нашим списком заведений, меню и закажите всё онлайн!
        </div>
        <div class="flex flex-col items-center mt-12 text-center">
            <span class="relative inline-flex w-full md:w-auto">
                <a href="{{ route('categories.index') }}" type="button"
                   class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full lg:w-full md:w-auto hover:bg-green-500 focus:outline-none">
                    Посмотреть список заведений
                </a>
            </span>
        </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-32 bg-white md:px-0">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full md:w-[45%] md:pr-5">
                    <div class="w-full h-auto overflow-hidden rounded-md sm:rounded-xl">
                        <img src="{{ asset('assets/mainfood.png') }}" />
                    </div>
                </div>
                <div class="w-full md:w-[45%] md:pl-5">
                    <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
                        <h3 class="text-xl font-bold">Наши блюда</h3>
                        <h2 class="text-4xl text-green-600">Сделано с любовью</h2>
                        <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
                            Изучите наше меню и выберите то, что вам особенно по вкусу! Вы можете удивить и побаловать ваших близких, закажите любое блюдо нашего ресторана и вам не придется ждать по приходу!
                        </p>
                        <div class="relative flex">
                            <a href="#_"
                               class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-green-600 rounded-md sm:mb-0 hover:bg-green-700 sm:w-auto">
                                Помотреть меню
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-green-100">
        <div class="container items-center max-w-6xl px-4 px-10 mx-auto sm:px-20 md:px-32 lg:px-16">
            <div class="flex flex-wrap items-center -mx-3">
                <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
                    <div class="w-full lg:max-w-md">
                        <h2 class="mb-4 text-2xl font-bold">О нас</h2>
                        <h2
                            class="mb-4 text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                            Почему выбирают нас?</h2>

                        <p class="mb-4 font-medium tracking-tight text-gray-400 xl:mb-6">
                            В наш развлекательный центр ежедневно приходят за отличным настроением и яркими праздниками. Мы точно знаем, что нужно нашим гостям, и с удовольствием работаем для вас.
                            Все заведения сертифицированы и соответствуют самым высоким стандартам качества. На всей территории строго придерживаются всех санитарных норм.
                            Развлечения на любой вкус. Для веселой компании или дружной семьи. Организовываем праздники и события, дарим скидки и устраиваем сюрпризы.
                            <br><strong>Профессионально. Творчески. С любовью.</strong>
                        </p>
                        <ul>
                            <li class="flex items-center py-2 space-x-4 xl:py-3">
                                <img src="{{ asset('assets/experience.png') }}" alt="" width="50" height="50">
                                <span class="font-medium text-gray-500">Всё можно заказать онлайн</span>
                            </li>
                            <li class="flex items-center py-2 space-x-4 xl:py-3">
                                <img src="{{ asset('assets/safety.png') }}" alt="" width="50" height="50">
                                <span class="font-medium text-gray-500">Комфорт и уют в заведениях</span>
                            </li>
                            <li class="flex items-center py-2 space-x-4 xl:py-3">
                                <img src="{{ asset('assets/diversity.png') }}" alt="" width="50" height="50">
                                <span class="font-medium text-gray-500">Любые развлечения на ваш вкус</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full px-3 mb-12 lg:w-1/2 order-0 lg:order-1 lg:mb-0"><img
                        class="mx-auto sm:max-w-sm lg:max-w-full"
                        src="{{ asset('assets/whyus.png') }}"
                        alt="feature image"></div>
            </div>
        </div>
    </section>
</x-guest-layout>
