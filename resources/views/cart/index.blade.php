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
                                @foreach($menus as $menu)
                                @if($item->menu_id == $menu->id)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
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
                            @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-between m-2 p-2">
                            <div class="font-bold">
                                Итого: <span class="cart-total"></span>₽
                            </div>
                            <a href="{{ route('cart.index') }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">
                                Перейти к оплате
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
