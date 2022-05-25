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
        <h2 class="text-center text-4xl xl:text-5xl text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Контактные данные</h2>
        <div class="container container max-w-4xl m-auto flex flex-wrap flex-col md:flex-row items-center justify-start mt-5">
            <div class="w-full lg:w-1/2 p-3">
                <div class="flex flex-col lg:flex-row rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg items-center">
                    <img class="block w-full lg:w-48 flex-none bg-cover h-24" src="<?php echo e(asset('assets/location.svg')); ?>">
                    <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="text-black font-bold text-xl mb-2 leading-tight">Наш адрес</div>
                        <p class="text-grey-darker text-base">г. Байконур, ул. Абая 14</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 p-3">
                <div class="flex flex-col lg:flex-row-reverse rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg items-center">
                    <img class="block w-full lg:w-48 flex-none bg-cover h-24" src="<?php echo e(asset('assets/phone.svg')); ?>">
                    <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="text-black font-bold text-xl mb-2 leading-tight">Номер телефона</div>
                        <p class="text-grey-darker text-base">+7 776 871 9177</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 p-3">
                <div class="flex flex-col lg:flex-row-reverse rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg items-center">
                    <img class="block w-full lg:w-48 flex-none bg-cover h-24" src="<?php echo e(asset('assets/email.svg')); ?>">
                    <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="text-black font-bold text-xl mb-2 leading-tight">Почта</div>
                        <p class="text-grey-darker text-base">alik_99_99@list.ru</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 p-3">
                <div class="flex flex-col lg:flex-row rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg items-center">
                    <img class="block w-full lg:w-48 flex-none bg-cover h-24" src="<?php echo e(asset('assets/clock.svg')); ?>">
                    <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="text-black font-bold text-xl mb-2 leading-tight">График работы</div>
                        <p class="text-grey-darker text-base">ПН - ВЫХОДНОЙ</p>
                        <p class="text-grey-darker text-base">ВТ-ВС - с 15.00 до 02.00</p>
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
<?php /**PATH C:\Users\OpenServer\domains\entertainment.ru\resources\views/contacts/index.blade.php ENDPATH**/ ?>