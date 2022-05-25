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
         style="background-image: url('assets/reviews.jpg')">
        <h1
            class="font-mono text-3xl font-extrabold text-base md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Отзывы</span>
        </h1>
        <div class="mx-auto mt-2 text-base md:text-center lg:text-lg">
            Посмотрите отзывы наших клиентов или оставьте свой
        </div>
    </div>
    <!-- End Main Hero Content -->
    <section class="px-2 py-10 md:px-0">
        <div class="container w-full px-20 mx-auto">
            <h1 class="font-medium leading-tight text-5xl mb-2 text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Отзывы</h1>
            <div class="mt-5">
                <?php if(session()->has('success')): ?>
                    <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        <span class="font-medium"><?php echo e(session()->get('success')); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(\Illuminate\Support\Facades\Auth::user()): ?>
            <form class="max-w-xl" method="POST" action="<?php echo e(route('reviews.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700"> Имя </label>
                    <div class="mt-1">
                        <input required value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->first_name); ?>" readonly type="text" id="name" name="name" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-sm text-red-400"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="sm:col-span-6 pt-2">
                    <label for="review_text" class="block text-sm font-medium text-gray-700">Текст отзыва</label>
                    <div class="mt-1">
                        <textarea required id="review_text" rows="3" name="review_text" class="<?php $__errorArgs = ['review_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    <?php $__errorArgs = ['review_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-sm text-red-400"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="sm:col-span-6 pt-2">
                    <label for="review_degree" class="block text-sm font-medium text-gray-700">Вид отзыва</label>
                    <div class="mt-1">
                        <select id="review_degree" name="review_degree" class="<?php $__errorArgs = ['review_degree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-multiselect block w-full mt-1">
                            <?php $__currentLoopData = $degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($degree); ?>">
                                    <?php echo e($degree); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <?php $__errorArgs = ['review_degree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-sm text-red-400"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="sm:col-span-6 pt-2">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Категория</label>
                    <div class="mt-1">
                        <select id="category_id" name="category_id" class="<?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-multiselect block w-full mt-1">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>">
                                    <?php echo e($category->id); ?> (<?php echo e($category->name); ?>)
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-sm text-red-400"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button type="submit" class=" mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Оставить отзыв</button>
            </form>
            <?php else: ?> <div><a href="<?php echo e(route('register')); ?>" class="text-green-600 hover:text-green-400">Зарегистрируйтесь,</a> чтобы оставить отзыв</div>
            <?php endif; ?>
            <div class="w-full">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col bg-white shadow-lg rounded-lg overflow-hidden mt-5">
                        <?php if($review->review_degree == 'Положительный'): ?>
                            <div class="flex justify-between items-center bg-green-200 text-gray-700 text-lg px-6 py-4">
                                <?php elseif($review->review_degree == 'Отрицательный'): ?>
                                    <div class="flex justify-between items-center bg-red-200 text-gray-700 text-lg px-6 py-4">
                                        <?php else: ?> <div class="flex justify-between items-center bg-yellow-200 text-gray-700 text-lg px-6 py-4">
                                            <?php endif; ?>
                                            <div><?php echo e($review->review_degree); ?></div>
                                            <div><?php echo e($review->name); ?></div>
                                        </div>
                                        <div class="flex justify-between items-center px-6 py-4">
                                            <div class="bg-orange-600 text-xs uppercase px-2 py-1 rounded-full border border-gray-200 text-gray-200 font-bold"><?php echo e($categories[$review->category_id - 1]->name); ?></div>
                                            <div class="text-sm"><?php echo e($review->created_at); ?></div>
                                        </div>

                                        <div class="px-6 py-4 border-t border-gray-200">
                                            <div class="border rounded-lg p-4 bg-gray-200">
                                                <?php echo e($review->review_text); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="d-flex justify-content-center mt-4">
                                        <?php echo $reviews->links(); ?>

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
<?php /**PATH C:\Users\OpenServer\domains\entertainment.ru\resources\views/reviews/index.blade.php ENDPATH**/ ?>