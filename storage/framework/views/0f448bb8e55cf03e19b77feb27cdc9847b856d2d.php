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
            <div class="flex justify-end m-2 p-2">
                <a href="<?php echo e(route('admin.orders.export')); ?>" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white mr-2">
                    Скачать excel таблицу
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table admin-table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID пользователя
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Код оплаты
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Оплата
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Сумма
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Статус
                        </th><th scope="col" class="px-6 py-3">
                            <span>Удалить</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <?php echo e($order->user_id); ?>

                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    №<?php echo e($order->code); ?>

                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <?php if($order->pay == 1): ?> Картой
                                    <?php else: ?> Наличными
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    ₽<?php echo e($order->total); ?>

                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap text-center">
                                    <?php if($order->check == 1): ?> Оплачено
                                    <?php else: ?> Не оплачено
                                    <form class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white"
                                          method="POST"
                                          id="payment_update"
                                          action="<?php echo e(route('admin.orders.update', $order->id)); ?>"
                                    >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("PUT"); ?>
                                        <button type="submit" class="w-full">Оплачено</button>
                                    </form>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                          id="destroy_entry"
                                          method="POST"
                                          action="<?php echo e(route('admin.orders.destroy', $order->id)); ?>"
                                    >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("DELETE"); ?>
                                        <button type="submit" class="w-full">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH E:\OpenServer\domains\entertainment\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>