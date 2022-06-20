<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="https://test-epay.homebank.kz/payform/payment-api.js"></script>
    <style>@import  url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');</style>
</head>

<body>
<div class="bg-white shadow-md" x-data="{ isOpen: false }">
    <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
            <a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-2xl hover:text-green-400"
               href="/">
                <img src="<?php echo e(asset('/assets/logo.svg')); ?>" alt="Logo" width="50px" class="inline-block">
            </a>
            <!-- Mobile menu button -->
            <div @click="isOpen = !isOpen" class="flex md:hidden">
                <button type="button"
                        class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                        aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path fill-rule="evenodd"
                              d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div :class="isOpen ? 'flex' : 'hidden'"
             class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
            <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
               href="/">
                <img src="<?php echo e(asset('assets/home.svg')); ?>" alt="" width="24" height="24" class="inline-block">
                Главная
            </a>
            <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
               href="<?php echo e(route('categories.index')); ?>">
                <img src="<?php echo e(asset('assets/entertainment.svg')); ?>" alt="" width="24" height="24" class="inline-block">
                Развлечения
            </a>
            <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
               href="<?php echo e(route('menus.index')); ?>">
                <img src="<?php echo e(asset('assets/menu.svg')); ?>" alt="" width="24" height="24" class="inline-block">
                Наше меню
            </a>
            <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
               href="<?php echo e(route('music.index')); ?>">
                <img src="<?php echo e(asset('assets/song.svg')); ?>" alt="" width="24" height="24" class="inline-block">
                Каталог песен
            </a>
            <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
               href="<?php echo e(route('gallery.index')); ?>">
                <img src="<?php echo e(asset('assets/gallery.svg')); ?>" alt="" width="24" height="24" class="inline-block">
                Фотогалерея
            </a>
            <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
               href="<?php echo e(route('cart.index')); ?>">
                <img src="<?php echo e(asset('assets/cart.svg')); ?>" alt="Корзина" width="24" height="24">
            </a>
            <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/dashboard')); ?>" class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">
                            <img src="<?php echo e(asset('assets/profile.svg')); ?>" alt="Корзина" width="24" height="24">
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">Вход</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">Регистрация</a>
                        <?php endif; ?>
                    <?php endif; ?>
            <?php endif; ?>
        </div>
    </nav>
</div>
<div class="font-sans text-gray-900 antialiased min-h-screen">
    <?php echo e($slot); ?>

</div>
<footer class="bg-gray-800 border-t border-gray-200">
    <div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between">
        <div class="flex flex-wrap justify-center">
            <ul class="flex items-center space-x-4 text-white">
                <li>
                    <a href="<?php echo e(route('tech-support.index')); ?>" class="hover:text-green-400">Тех поддержка</a>
                </li>
                <li>
                    <a href="<?php echo e(route('reviews.index')); ?>" class="hover:text-green-400">Отзывы</a>
                </li>
                <li>
                    <a href="<?php echo e(route('contacts.index')); ?>" class="hover:text-green-400">Контактные данные</a>
                </li>
                <li>
                    <a href="<?php echo e(route('news.index')); ?>" class="hover:text-green-400">Новости</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
<?php /**PATH C:\Users\OpenServer\domains\entertainment.ru\resources\views/layouts/guest.blade.php ENDPATH**/ ?>