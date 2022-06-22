<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Личный кабинет')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bk-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-indigo-400 to-blue-500 hover:text-green-400">Информация о заказе</h1>
            <p class="text-2xl text-blue-500">Заказчик: <?php echo e($order->user->first_name); ?> <?php echo e($order->user->last_name); ?></p>
            <p class="text-2xl text-blue-500">Время заказа: <?php echo e($order->created_at); ?></p>
            <p class="text-2xl text-blue-500">Код оплаты: <?php echo e($order->code); ?></p>
            <p class="text-2xl text-blue-500">
                Вид оплаты: <?php if($order->pay == 1): ?> Полная оплата
                <?php elseif($order->pay == 3): ?> Доставка
                <?php else: ?> Предоплата 50%
                <?php endif; ?>
            </p>
            <p class="text-2xl text-blue-500">
                Статус оплаты: <?php if($order->check == 1 && $order->pay == 1): ?> Оплачено
                <?php elseif($order->check == 1 && $order->pay == 2): ?> Частично оплачено
                <?php else: ?> Не оплачено
                <?php endif; ?>
            </p>
            <p class="text-2xl text-indigo-500">
                Сумма заказа: <?php if($order->pay == 1): ?> ₽<?php echo e($order->total); ?>

                <?php elseif($order->pay == 3): ?> ₽<?php echo e($order->total); ?>

                <?php else: ?> ₽<?php echo e($order->total/2); ?>/₽<?php echo e($order->total); ?>

                <?php endif; ?>
            </p>
            <?php if($order->pay == 3): ?>
            <p class="text-2xl mb-3 text-indigo-500">
                Примечание к заказу: <?php echo e($order->order_info['delivery_info']); ?>

            </p>
            <?php endif; ?>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <?php if($order->order_info->food_info != []): ?>
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
                        <?php $__currentLoopData = $order->order_info->food_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item food-item">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap food-name">
                                    <?php echo e($menu['name']); ?>

                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap food-name">
                                    <?php echo e($menu['qty']); ?>

                                </td>
                                <td class="menu_price px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap max-w-xl truncate">
                                    <?php echo e($menu['amount']); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
                <?php if($order->order_info->res_info != []): ?>
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
                        <?php $__currentLoopData = $order->order_info->res_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item">
                                <td class="px-6 py-4">
                                    <?php echo e($reservation['date']); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php echo e($reservation['table']); ?> - <?php echo e($reservation['table_cat']); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php echo e($reservation['guest_num']); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php echo e($reservation['res_amount']); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
                <?php if($order->order_info->song_info != []): ?>
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
                        <?php $__currentLoopData = $order->order_info->song_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 cart-item">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap info-singer">
                                    <?php echo e($song['artist']); ?>

                                </th>
                                <th class="px-6 py-4 info-song">
                                    <?php echo e($song['songName']); ?>

                                </th>
                                <th class="px-6 py-4 info-genres">
                                    <?php echo e($song['genre']); ?>

                                </th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH C:\Users\OpenServer\domains\entertainment.ru\resources\views/admin/orders/info.blade.php ENDPATH**/ ?>