<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GuestLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Ваша корзина</h1>
            <div class="bk-page">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex justify-end m-2 p-2">
                        <a href="<?php echo e(route('cart.create')); ?>" class="delete-all px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">
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
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->user_id == \Illuminate\Support\Facades\Auth::id()): ?>
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->menu_id == $menu->id): ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <?php echo e($menu->name); ?>

                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <img src="<?php echo e(asset('assets/'.$menu->image)); ?>" alt="Image" class="w-32 h-24 rounded mx-auto">
                                    </td>
                                    <input type="hidden" value="<?php echo e($menu->price); ?>" class="menu_init_price">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap max-w-xl truncate">
                                        <div class="custom-number-input h-10 w-32">
                                            <input type="number" class="menu_qty outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                                                   min="1"
                                                   name="menu_qty"
                                                   value="<?php echo e($item->menu_qty); ?>">
                                        </div>
                                    </td>

                                    <td class="menu_price px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap max-w-xl truncate">
                                        <?php echo e($menu->price * $item->menu_qty); ?>

                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white text-center"
                                              id="destroy_entry"
                                              method="POST"
                                              action="<?php echo e(route('cart.destroy', $item->id)); ?>"
                                        >
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field("DELETE"); ?>
                                            <button type="submit">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php else: ?> <?php continue; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->user_id == \Illuminate\Support\Facades\Auth::id()): ?>
                                    <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->res_id == $reservation->id): ?>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item">
                                                <td class="px-6 py-4">
                                                    <?php echo e($item->res_date); ?>

                                                </td>
                                                <td class="px-6 py-4">
                                                    <?php echo e($reservation->name); ?>

                                                </td>
                                                <td class="px-6 py-4">
                                                    <?php echo e($reservation->guest_number); ?>

                                                </td>
                                                <td class="px-6 py-4 menu_price">
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($cat->name == $reservation->location): ?> <?php echo e($cat->res_price); ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white text-center"
                                                          id="destroy_entry"
                                                          method="POST"
                                                          action="<?php echo e(route('cart.destroy', $item->id)); ?>"
                                                    >
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field("DELETE"); ?>
                                                        <button type="submit">Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php else: ?> <?php continue; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->user_id == \Illuminate\Support\Facades\Auth::id()): ?>
                                    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->song_id == $song->id): ?>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                    <?php echo e($song->singer); ?>

                                                </th>
                                                <th class="px-6 py-4">
                                                    <?php echo e($song->song_name); ?>

                                                </th>
                                                <th class="px-6 py-4">
                                                    <?php echo e($song->genre); ?>

                                                </th>
                                                <td class="px-6 py-4 truncate max-w-[200px]">
                                                    <a href="<?php echo e($song->video_link); ?>" target="_blank">
                                                        <img src="<?php echo e(asset('assets/youtube.svg')); ?>" alt="" width="32">
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white text-center"
                                                          id="destroy_entry"
                                                          method="POST"
                                                          action="<?php echo e(route('cart.destroy', $item->id)); ?>"
                                                    >
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field("DELETE"); ?>
                                                        <button type="submit">Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php else: ?> <?php continue; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <img src="<?php echo e(asset('assets/card.svg')); ?>" alt="CARD" class="w-10">
                                </label>
                                <input type="radio" class="payment-toggle" id="pay-card" name="pay" value="1">
                                <p>Полная оплата</p>
                            </div>
                            <div class="flex items-center gap-1 payment-radio">
                                <label class="payment-item flex" for="pay-cash">
                                    <img src="<?php echo e(asset('assets/card.svg')); ?>" alt="CARD" class="w-10">
                                    <span class="text-4xl mx-1">/</span>
                                    <img src="<?php echo e(asset('assets/cash.svg')); ?>" alt="CASH" class="w-10">
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php /**PATH C:\Users\OpenServer\domains\entertainment.ru\resources\views/cart/index.blade.php ENDPATH**/ ?>