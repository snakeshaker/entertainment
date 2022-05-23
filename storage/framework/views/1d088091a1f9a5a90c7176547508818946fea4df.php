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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="flex justify-between m-2 p-2">
                            <div class="cart-total">
                                Итого:
                            </div>
                            <a href="<?php echo e(route('cart.index')); ?>" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">
                                Перейти к оплате
                            </a>
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
<?php /**PATH E:\OpenServer\domains\entertainment\resources\views/cart/index.blade.php ENDPATH**/ ?>