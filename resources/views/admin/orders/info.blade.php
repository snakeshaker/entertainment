<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12 bk-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-indigo-400 to-blue-500 hover:text-green-400">Информация о заказе</h1>
            <p class="text-2xl text-blue-500">Заказчик: {{ $order->user->first_name }} {{ $order->user->last_name }}</p>
            <p class="text-2xl text-blue-500">Время заказа: {{ $order->created_at }}</p>
            <p class="text-2xl text-blue-500">Код оплаты: {{ $order->code }}</p>
            <p class="text-2xl text-blue-500">
                Вид оплаты: @if($order->pay == 1) Полная оплата
                @elseif($order->pay == 3) Доставка
                @else Предоплата 50%
                @endif
            </p>
            <p class="text-2xl text-blue-500">
                Статус оплаты: @if($order->check == 1 && $order->pay == 1) Оплачено
                @elseif($order->check == 1 && $order->pay == 2) Частично оплачено
                @else Не оплачено
                @endif
            </p>
            <p class="text-2xl mb-3 text-blue-500">
                Сумма заказа: @if($order->pay == 1) ₽{{ $order->total }}
                @elseif($order->pay == 3) ₽{{ $order->total }}
                @else ₽{{ $order->total/2 }}/₽{{ $order->total }}
                @endif
            </p>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                @if($order->order_info->food_info != [])
                <div class="food_info">
                    <h2 class="text-4xl text-blue-500">Блюда</h2>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table admin-table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Название
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Количество
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Сумма
                            </th>
                        </tr>
                        </thead>
                        <tbody class="cart-body">
                        @foreach($order->order_info->food_info as $menu)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item food-item">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap food-name">
                                    {{ $menu['name'] }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap food-name">
                                    {{ $menu['qty'] }}
                                </td>
                                <td class="menu_price px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap max-w-xl truncate">
                                    {{ $menu['amount'] }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                @if($order->order_info->res_info != [])
                <div class="res_info">
                    <h2 class="text-4xl text-blue-500">Бронирования</h2>
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
                        </tr>
                        </thead>
                        <tbody class="cart-body">
                        @foreach($order->order_info->res_info as $reservation)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item">
                                <td class="px-6 py-4">
                                    {{ $reservation['date'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $reservation['table'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $reservation['guest_num'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $reservation['res_amount'] }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                @if($order->order_info->song_info != [])
                <div class="song_info">
                    <h2 class="text-4xl text-blue-500">Песни</h2>
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
                        </tr>
                        </thead>
                        <tbody class="cart-body">
                        @foreach($order->order_info->song_info as $song)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap info-singer">
                                    {{ $song['artist'] }}
                                </th>
                                <th class="px-6 py-4 info-song">
                                    {{ $song['songName'] }}
                                </th>
                                <th class="px-6 py-4 info-genres">
                                    {{ $song['genre'] }}
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
