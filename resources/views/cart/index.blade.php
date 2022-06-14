<x-guest-layout>
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Ваша корзина</h1>
            <div class="bk-page">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex justify-end m-2 p-2">
                        <a href="{{ route('cart.create') }}" class="delete-all px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">
                            Очистить корзину
                        </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <h2 class="text-4xl text-green-600">Блюда</h2>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table admin-table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Название
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Картинка
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Количество
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Сумма
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span>Удалить</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="cart-body">
                            @foreach($cart as $item)
                                @if($item->user_id == \Illuminate\Support\Facades\Auth::id())
                                @foreach($menus as $menu)
                                @if($item->menu_id == $menu->id)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item food-item">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap food-name">
                                        {{ $menu->name }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <img src="{{ asset('assets/'.$menu->image) }}" alt="Image" class="w-32 h-24 rounded mx-auto">
                                    </td>
                                    <input type="hidden" value="{{ $menu->price }}" class="menu_init_price">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap max-w-xl truncate">
                                        <div class="custom-number-input h-10 w-32">
                                            <input type="number" class="menu_qty outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                                                   min="1"
                                                   name="menu_qty"
                                                   value="{{ $item->menu_qty }}">
                                        </div>
                                    </td>

                                    <td class="menu_price px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap max-w-xl truncate">
                                        {{ $menu->price * $item->menu_qty }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white text-center"
                                              id="destroy_entry"
                                              method="POST"
                                              action="{{ route('cart.destroy', $item->id) }}"
                                        >
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                                @else @continue
                                @endif
                                @endforeach
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <h2 class="text-4xl text-green-600">Бронирования</h2>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table admin-table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Дата бронирования
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Место
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Кол-во гостей
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Сумма
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span>Удалить</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="cart-body">
                            @foreach($cart as $item)
                                @if($item->user_id == \Illuminate\Support\Facades\Auth::id())
                                    @foreach($reservations as $reservation)
                                        @if($item->res_id == $reservation->id)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item">
                                                <td class="px-6 py-4 res_date">
                                                    {{ $item->res_date }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $reservation->name }}
                                                </td>
                                                <input type="hidden" class="table_id" value="{{ $reservation->id }}">
                                                <td class="px-6 py-4 res_guest">
                                                    {{ $item->guest_number }}
                                                </td>
                                                <td class="px-6 py-4 menu_price">
                                                    @foreach($categories as $cat)
                                                        @if($cat->name == $reservation->location) {{ $cat->res_price }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white text-center"
                                                          id="destroy_entry"
                                                          method="POST"
                                                          action="{{ route('cart.destroy', $item->id) }}"
                                                    >
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit">Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @else @continue
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <h2 class="text-4xl text-green-600">Песни</h2>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table admin-table">
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
                                    <span>Удалить</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="cart-body">
                            @foreach($cart as $item)
                                @if($item->user_id == \Illuminate\Support\Facades\Auth::id())
                                    @foreach($songs as $song)
                                        @if($item->song_id == $song->id)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap info-singer">
                                                    {{ $song->singer }}
                                                </th>
                                                <th class="px-6 py-4 info-song">
                                                    {{ $song->song_name }}
                                                </th>
                                                <th class="px-6 py-4 info-genres">
                                                    {{ $song->genre }}
                                                </th>
                                                <td class="px-6 py-4 truncate max-w-[200px]">
                                                    <a href="{{ $song->video_link }}" target="_blank">
                                                        <img src="{{ asset('assets/youtube.svg') }}" alt="" width="32">
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white text-center"
                                                          id="destroy_entry"
                                                          method="POST"
                                                          action="{{ route('cart.destroy', $item->id) }}"
                                                    >
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit">Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @else @continue
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-between m-2 p-2">
                            <div class="font-bold">
                                Итого: <span class="cart-total"></span>₽
                            </div>
                            <div class="form-check">
                                <input
                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="checkbox" value="" id="dostavka" name="dostavka">
                                <label class="form-check-label inline-block text-gray-800" for="dostavka">
                                    Доставка на дом
                                </label>
                            </div>
                            <div class="flex items-center gap-1 payment-radio">
                                <label class="payment-item" for="pay-card">
                                    <img src="{{ asset('assets/card.svg') }}" alt="CARD" class="w-10">
                                </label>
                                <input type="radio" class="payment-toggle" id="pay-card" name="pay" value="1">
                                <p>Полная оплата</p>
                            </div>
                            <div class="flex items-center gap-1 payment-radio">
                                <label class="payment-item flex" for="pay-cash">
                                    <img src="{{ asset('assets/card.svg') }}" alt="CARD" class="w-10">
                                    <span class="text-4xl mx-1">/</span>
                                    <img src="{{ asset('assets/cash.svg') }}" alt="CASH" class="w-10">
                                </label>
                                <input type="radio" class="payment-toggle" id="pay-cash" name="pay" value="2">
                                <p>Предоплата 50%</p>
                            </div>
                            <input type="radio" class="payment-toggle hidden" id="pay-dostavka" name="pay" value="3">
                            <input type="hidden" id="pay-output">
                            <input
                                type="hidden"
                                id="total">
                            <button id="confirm-order" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">
                                Перейти к оплате
                            </button>
                        </div>
                        <div class="flex justify-center hidden dostavka-checked">
                            <div class="mb-3 w-full mx-5">
                                <p class="text-xs text-red-600 font-bold">Доставка в течение часа</p>
                                <label for="dostavka-info" class="form-label inline-block mb-2 text-gray-700">
                                    Примечание к заказу
                                </label>
                                <textarea
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="dostavka-info"
                                    name="dostavka-info"
                                    rows="3"
                                    placeholder="Адрес доставки и прочая информация..."
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
