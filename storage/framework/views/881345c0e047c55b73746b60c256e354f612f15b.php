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
        <h2 class="text-center uppercase text-4xl xl:text-5xl text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Новости</h2>
        <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('news.show', $new->id)); ?>">
                <div class="flex flex-col md:flex-row overflow-hidden bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">
                    <div class="h-64 w-auto md:w-1/2">
                        <img class="inset-0 h-full w-full object-cover object-center" src="<?php echo e(asset('assets/'.$new ->image)); ?>" />
                    </div>
                    <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                        <h3 class="font-semibold text-lg leading-tight truncate"><?php echo e($new->news_title); ?></h3>
                        <p class="mt-2 max-h-[calc(16rem-100px)] overflow-hidden">
                            <?php echo e($new->news_text); ?>

                        </p>
                        <div class="flex justify-between">
                            <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                                дата создания: <?php echo e(Carbon\Carbon::parse($new->created_at)->format('Y-m-d')); ?>

                            </p>
                            <p class="hover:text-gray-400">Посмотреть ></p>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center mt-4">
                <?php echo $news->links(); ?>

            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php /**PATH C:\Users\OpenServer\domains\entertainment.ru\resources\views/news/index.blade.php ENDPATH**/ ?>