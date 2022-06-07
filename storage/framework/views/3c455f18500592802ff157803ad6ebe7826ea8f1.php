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
         style="background-image: url('assets/media_entertainment.png')">
        <h1
            class="font-mono text-3xl font-extrabold text-white md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Развлечения</span>
        </h1>
        <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
            Развлечения - эта шелуха праздников. Есть обычай оформлять особые дни отказом от будничных забот, специальной пищей,
            особыми видами физической и интеллектуальной активности итд. Когда люди лишены праздников, они создают себе развлечения
            - все то же самое, еда, праздность, забавы, только без смыслового наполнения.
        </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-10 bg-white md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Список развлечений</h1>
            <div class="flex flex-wrap -mx-4 px-20">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
                        <a href="<?php echo e(route('categories.show', $category->id)); ?>" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" src="<?php echo e(asset('assets/'.$category->image)); ?>" alt="Image">
                            </div>
                            <div class="p-4">
                                <span class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">БРОНИРОВАНИЕ</span>
                                <h2 class="mt-2 mb-2 uppercase font-bold"><?php echo e($category->name); ?></h2>
                                <p class="text-sm"><?php echo e($category->description); ?></p>
                            </div>
                            <div class="p-4 border-t border-b text-xs text-gray-700">
                                <span class="ml-2">
                                    <?php echo e($category->reviews->count()); ?> отзыв(-а/-ов)
                                </span>
                            </div>
                        </a>
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
<?php /**PATH C:\Users\OpenServer\domains\entertainment.ru\resources\views\categories\index.blade.php ENDPATH**/ ?>