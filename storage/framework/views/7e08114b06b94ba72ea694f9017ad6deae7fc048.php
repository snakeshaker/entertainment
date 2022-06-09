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
        <h2 class="text-center text-4xl xl:text-5xl text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Каталог песен</h2>
        <div class="container container max-w-4xl m-auto flex flex-wrap flex-col md:flex-row items-center justify-start mt-5">
            <div class="py-6 bk-page">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table">
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
<?php /**PATH C:\Users\OpenServer\domains\entertainment.ru\resources\views/music/index.blade.php ENDPATH**/ ?>