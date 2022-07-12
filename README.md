# Laravel Application

> Laravel project of entertainment center.
> Website and admin panel with CRUDs and dynamically changeable pages.
> Works with Halyk Bank EPAY API

## Quick Start

```bash
# download or clone repository
https://github.com/snakeshaker/entertainment.git

# install dependencies
composer install
npm install 

# copy file .env
copy .env.example .env

# generate a key
php artisan key:generate

# database configuration
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password

# migrate to create database
php artisan migrate --seed

#database mock
INSERT INTO `categories` (`id`, `name`, `description`, `image`, `space_image`, `res_price`, `created_at`, `updated_at`) VALUES (2, 'Боулинг', 'Боулинг (от англ. to bowl — катить) — спортивная игра в шары, которая произошла от игры в кегли. Цель игры — с помощью как можно меньшего количества пускаемых руками шаров сбить кегли, установленные особым образом в конце безбортовой дорожки.', 'categories/25toaV72f9i3TeMJ6hPnnZ17kpVGSedfqiWlysOF.jpg', 'categories/3Ycsvdbe8mhWfHPS8D5eNG683hkjh8HCS0XzSXri.svg',  300.00, '2022-05-10 08:04:20', '2022-05-10 08:04:20');
INSERT INTO `categories` (`id`, `name`, `description`, `image`, `space_image`, `res_price`, `created_at`, `updated_at`) VALUES (3, 'Караоке-бар', 'Если Вы ищете место, где можно приятно провести время с друзьями, хорошо отдохнуть в непринужденной обстановке и почувствовать себя настоящей звездой, то караоке — именно то, что Вам нужно! Шикарный интерьер, качественный звук и приятная атмосфера.', 'categories/OPLmaVQIcLW5g56UR2OWe8pnSTPEOHQ6aAoka4AK.jpg', 'categories/9v3FABOJ6QmLulKIybmb1l15x6vtPfY9SePL5Al1.png',  500.00, '2022-05-10 08:15:22', '2022-05-10 08:15:22');
INSERT INTO `categories` (`id`, `name`, `description`, `image`, `space_image`, `res_price`, `created_at`, `updated_at`) VALUES (4, 'Бильярдная', 'Билья́рд, реже биллиа́рд (фр. billard, от фр. bille — шар или фр. billette, billart — палка) — собирательное имя нескольких настольных игр с разными правилами, а также специальный стол, на котором происходит игра.', 'categories/zq4kP1HJPbbAb2mGtopEY7RQ1cLIMgFlI4BeBqSm.jpg', 'categories/0C3WlAmQXTils8kzp33Y6xaOXn4gwu5JtkN2JVdF.png',  200.00, '2022-05-11 08:29:43', '2022-05-11 08:29:43');
INSERT INTO `food_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'Фаст-Фуд', NULL, NULL);
INSERT INTO `menus` (`id`, `name`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES (1, 'Гамбургер', 'Вкуснейший сочный бургер по фирменному рецепту', 'menus/xKHMoLxXn808PFSKJKdS3VNGLLS6mQRcerL5WfFC.jpg', 300.00, '2022-05-10 08:17:24', '2022-05-10 08:17:24');
INSERT INTO `food_category_menu` (`food_category_id`, `menu_id`) VALUES (1, 1);
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (1, 'Дорожка 1', 6, 2, '2022-05-10 08:09:17', '2022-05-10 08:10:07');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (2, 'Дорожка 2', 6, 2, '2022-05-10 08:09:17', '2022-05-10 08:09:17');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (3, 'Дорожка 3', 6, 2, '2022-05-10 08:09:17', '2022-05-10 08:10:15');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (4, 'Дорожка 4', 6, 2, '2022-05-10 08:09:17', '2022-05-10 08:09:17');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (5, 'Дорожка 5', 6, 2, '2022-05-10 08:09:17', '2022-05-10 08:09:17');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (11, 'Столик 1', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:15:52');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (12, 'Столик 2', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:16:15');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (13, 'Столик 3', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:15:52');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (14, 'Столик 4', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:16:20');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (15, 'Столик 5', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:15:52');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (16, 'Столик 6', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:15:52');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (23, 'Бильярдный стол 1', 15, 4, '2022-05-11 08:37:55', '2022-05-11 08:37:55');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (24, 'Бильярдный стол 2', 15, 4, '2022-05-11 08:37:55', '2022-05-11 08:39:07');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (25, 'Бильярдный стол 3', 15, 4, '2022-05-11 08:37:55', '2022-05-11 08:39:01');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (26, 'Бильярдный стол 4', 15, 4, '2022-05-11 08:37:55', '2022-05-11 08:38:54');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (27, 'Бильярдный стол 5', 15, 4, '2022-05-11 08:37:55', '2022-05-11 08:37:55');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (17, 'Столик 7', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:15:52');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (18, 'Столик 8', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:15:52');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (19, 'Столик 9', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:15:52');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (20, 'Столик 10', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:15:52');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (21, 'Столик 11', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:15:52');
INSERT INTO `tables` (`id`, `name`, `guest_number`, `category_id`, `created_at`, `updated_at`) VALUES (22, 'Столик 12', 7, 3, '2022-05-10 08:15:52', '2022-05-10 08:15:52');
INSERT INTO `reviews` (`id`, `name`, `user_id`, `category_id`, `review_text`, `review_degree`, `created_at`, `updated_at`) VALUES (1, 'Борис', 1, 2, 'Караоке-бар полный отстой', 'Отрицательный', '2022-05-11 03:27:50', '2022-05-11 03:27:50');
INSERT INTO `reviews` (`id`, `name`, `user_id`, `category_id`, `review_text`, `review_degree`, `created_at`, `updated_at`) VALUES (2, 'Admin', 1, 1, 'Супер местечко, все четко', 'Положительный', '2022-05-11 05:43:25', '2022-05-11 05:43:25');
INSERT INTO `reviews` (`id`, `name`, `user_id`, `category_id`, `review_text`, `review_degree`, `created_at`, `updated_at`) VALUES (3, 'Admin', 1, 1, 'Так себе, могло быть и лучше', 'Нейтральный', '2022-05-11 05:44:08', '2022-05-11 05:44:08');
INSERT INTO `reviews` (`id`, `name`, `user_id`, `category_id`, `review_text`, `review_degree`, `created_at`, `updated_at`) VALUES (4, 'Admin', 1, 3, 'Лучшее место!', 'Положительный', '2022-05-11 08:39:43', '2022-05-11 08:39:43');
INSERT INTO `reviews` (`id`, `name`, `user_id`, `category_id`, `review_text`, `review_degree`, `created_at`, `updated_at`) VALUES (7, 'Олег', 1, 1, 'Ужасное обслуживание, кегли поломанные', 'Отрицательный', '2022-05-11 10:34:28', '2022-05-11 10:34:28');
INSERT INTO `reviews` (`id`, `name`, `user_id`, `category_id`, `review_text`, `review_degree`, `created_at`, `updated_at`) VALUES (8, 'Алексей', 1, 1, 'Всё супер!', 'Положительный', '2022-05-11 10:34:45', '2022-05-11 10:34:45');
```
