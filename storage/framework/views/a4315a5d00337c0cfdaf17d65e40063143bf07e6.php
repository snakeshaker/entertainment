<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GuestLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
         style="background-image: url('<?php echo e(asset('assets/food.jpg')); ?>')">
        <h1
            class="font-mono text-3xl font-extrabold text-white md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Наше меню</span>
        </h1>
        <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
            Изучите наше меню и выберите то, что вам особенно по вкусу!
            Вы можете удивить и побаловать ваших близких, закажите любое блюдо нашего ресторана и заберите его во второй половине дня по пути домой.
        </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Список блюд</h1>
            <a href="<?php echo e(route('menus.index')); ?>" type="button"
               class="bg-blue-400 hover:bg-green-400 text-white text-sm px-4 py-2  border rounded-full">
                Все блюда
            </a>
            <?php $__currentLoopData = $foodCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($foodCategory->id == $category->id): ?>
                    <a href="<?php echo e(route('menus.show', $category->id)); ?>" type="button"
                       class="bg-green-400 hover:bg-green-600 text-white text-sm px-4 py-2  border rounded-full">
                        <?php echo e($category->name); ?>

                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('menus.show', $category->id)); ?>" type="button"
                       class="bg-blue-400 hover:bg-green-400 text-white text-sm px-4 py-2  border rounded-full">
                        <?php echo e($category->name); ?>

                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="flex flex-wrap -mx-4 px-20">
                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
                        <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" src="<?php echo e(asset('assets/'.$menu->image)); ?>" alt="Image">
                            </div>
                            <div class="p-4">
                                <?php $__currentLoopData = $menu->food_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="inline-block px-2 py-1 leading-none bg-blue-100 text-indigo-500 rounded-full font-semibold uppercase tracking-wide text-xs">
                                            <?php echo e($category->name); ?>

                                        </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <h2 class="mt-2 mb-2  font-bold"><?php echo e($menu->name); ?></h2>
                                <p class="text-sm"><?php echo e($menu->description); ?></p>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <span class="font-bold text-xl"><?php echo e($menu->price); ?></span>&nbsp;
                                        <span class="text-sm font-semibold">₽</span>
                                    </div>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php /**PATH C:\Users\OpenServer\domains\entertainment.ru\resources\views/menus/show.blade.php ENDPATH**/ ?>