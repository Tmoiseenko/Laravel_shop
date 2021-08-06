
## Дипломная работа PHP разрабочик с 0 до Pro Часть 3


### _1.1 Модель хранения данных_

![Alt text](project/shop_schema_ver4.png?raw=true "Модель хранения данных")

В проекте планируется содать следующие модели:
- Product
- ViewedProduct _(Связь с составным внешним ключём product_id-seller_id таблицы product_seller)_
- Seller
- Manufacturer
- User
- Category 
- Review 
- Image _(Полиморфная связь один ко многим, модели: Seller, Product, User, Category, Banner)_
- Banner
- Order
- OrderItem _(Связь с составным внешним ключём product_id-seller_id таблицы product_seller)_
- Delivery
- Discount _(Полиморфная связь многие ко многим через таблицу discountable, модели: Category, Product, CartDiscountCondition)_
- CartDiscountCondition для хранения условий предоставления скидки на корзину
- Payment

### _1.2 Cтруктура url на сайте_


| Раздел | Страница | Описание | HTTP метод | URL | Комментарий |
| ------ | ------ | ------ | ------ | ------ | ------ |
| Главная |	Главная страница |	Главный баннер и категории товаров |	GET |	shop/ |	- |
| Каталог | Перечень товаров | Каталог, популярные товары, скидки | GET | shop/products/ | - |
| Каталог | Детальная страница | Просмотр страницы товара | GET | shop/products/<name> | - |
| Каталог | Детальная страница | Добавление нового отзыва | POST | shop/products/<name>/reviews | - |
| Каталог | Детальная страница | Сравнение товаров | GET | shop/products/comparison | id сравниваемых товаров добавляются в сессию и выгружаются из неё при сравнении |
| Страница о продавце | Детальная страница | Просмотр страницы о продавце | GET | shop/products/<name>/sellers/<id> | - |
| Страница о скидках  | Перечень скидок | Перечень скидок всех товаров | GET | shop/discounts | - |
| Страница о скидках  | Детальная страница | Просмотр страницы скидки | GET | shop/discounts/<id> | - |
| Оформление заказа | Детальная страница | Просмотр корзины | GET | shop/orders/cart | корзина хранится в сессии пользователя и получается из неё  |
| Оформление заказа | Детальная страница | Редактирование корзины (количество, удаление товаров) | PATCH | shop/orders/cart | редактирование корзины в сессии |
| Оформление заказа | Детальная страница | Удаление корзины | DELETE | shop/orders/cart | удаление корзины из сессии |
| Оформление заказа | Пошаговая форма заказа | Заполнение формы | GET | shop/orders/ordering |  |
| Оформление заказа | Пошаговая форма заказа | Нажатие кнопки "Оплатить" | POST | shop/orders | Создание нового заказа, запись корзины в БД в order_items |
| Оформление заказа | Детальная страница оплаты | Редактирование формы опалаты(счёт, способ) | GET | shop/orders/<id>/checkin | - |
| Оформление заказа | Детальная страница оплаты | Нажатие кнопки "Оплатить" | POST | shop/orders/<id>/checkin | - |
| Личный кабинет | Детальная страница | Просмотр кабинета | GET | shop/cabinet/<id> | - |
| Личный кабинет | Детальная страница | Просмотр профиля | GET | shop/cabinet/<id>/profile | - |
| Личный кабинет | Детальная страница | Редактирование профиля | PATCH | shop/cabinet/<id>/profile | - |
| Личный кабинет | Детальная страница | История просмотров | GET | shop/cabinet/<id>/viewed | - |
| Личный кабинет | Детальная страница | История заказов | GET | shop/cabinet/<id>/orders | - |
| Административный раздел | Перечень пользователей | Просмотр пользователей | GET | shop/admin/users | - |
| Административный раздел | Форма создания пользователя | Создание пользователя | GET | shop/admin/users/create | - |
| Административный раздел | Форма создания пользователя | Сохранение пользователя | POST | shop/admin/users | - |
| Административный раздел | Форма редактирования пользователя | Редактирование пользователя | GET | shop/admin/users/<id> | - |
| Административный раздел | Форма редактирования пользователя | Изменение пользователя | PATCH | shop/admin/users/<id> | - |
| Административный раздел | Перечень пользователей | Удаление пользователя | DELETE | shop/admin/users/<id> | - |
| Административный раздел | Перечень товаров | Просмотр товаров | GET | shop/admin/products | - |
| Административный раздел | Форма создания товара | Создание товара | GET | shop/admin/products/create | - |
| Административный раздел | Форма создания товара | Сохранение товара | POST | shop/admin/products | - |
| Административный раздел | Форма редактирования товара | Редактирование товара | GET | shop/admin/products/<id> | - |
| Административный раздел | Форма редактирования товара | Изменение товара | PATCH | shop/admin/products/<id> | - |
| Административный раздел | Перечень товаров | Удаление товара | DELETE | shop/admin/products/<id> | - |
| Административный раздел | Перечень заказов | Просмотр заказов | GET | shop/admin/orders | - |
| Административный раздел | Форма создания заказа | Создание товара | GET | shop/admin/orders/create | - |
| Административный раздел | Форма создания заказа | Сохранение товара | POST | shop/admin/orders | - |
| Административный раздел | Форма редактирования заказа | Редактирование товара | GET | shop/admin/orders/<id> | - |
| Административный раздел | Форма редактирования заказа | Изменение товара | PATCH | shop/admin/orders/<id> | - |
| Административный раздел | Перечень заказов | Удаление товара | DELETE | shop/admin/orders/<id> | - |
| Административный раздел | Перечень категорий | Просмотр категорий | GET | shop/admin/categories | - |
| Административный раздел | Форма создания категории | Создание категории | GET | shop/admin/categories/create | - |
| Административный раздел | Форма создания категории | Сохранение категории | POST | shop/admin/categories | - |
| Административный раздел | Форма редактирования категории | Редактирование категории | GET | shop/admin/categories/<id> | - |
| Административный раздел | Форма редактирования категории | Изменение категории | PATCH | shop/admin/categories/<id> | - |
| Административный раздел | Перечень категорий | Удаление категории | DELETE | shop/admin/categories/<id> | - |
| Административный раздел | Перечень отзывов | Просмотр отзывов | GET | shop/admin/reviews | - |
| Административный раздел | Форма создания отзыва | Создание отзыва | GET | shop/admin/reviews/create | - |
| Административный раздел | Форма создания отзыва | Сохранение отзыва | POST | shop/admin/reviews | - |
| Административный раздел | Форма редактирования отзыва | Редактирование отзыва | GET | shop/admin/reviews/<id> | - |
| Административный раздел | Форма редактирования отзыва | Изменение отзыва | PATCH | shop/admin/reviews/<id> | - |
| Административный раздел | Перечень отзывов | Удаление отзыва | DELETE | shop/admin/reviews/<id> | - |
| Административный раздел | Перечень баннеров | Просмотр баннеров | GET | shop/admin/banners | - |
| Административный раздел | Форма создания баннера | Создание баннера | GET | shop/admin/banners/create | - |
| Административный раздел | Форма создания баннера | Сохранение баннера | POST | shop/admin/banners | - |
| Административный раздел | Форма редактирования баннера | Редактирование баннера | GET | shop/admin/banners/<id> | - |
| Административный раздел | Форма редактирования баннера | Изменение баннера | PATCH | shop/admin/banners/<id> | - |
| Административный раздел | Перечень баннеров | Удаление баннера | DELETE | shop/admin/banners/<id> | - |
| Административный раздел | Перечень скидок | Просмотр баннеров | GET | shop/admin/discounts | - |
| Административный раздел | Форма создания скидки | Создание баннера | GET | shop/admin/discounts/create | - |
| Административный раздел | Форма создания скидки | Сохранение баннера | POST | shop/admin/discounts | - |
| Административный раздел | Форма редактирования скидки | Редактирование баннера | GET | shop/admin/discounts/<id> | - |
| Административный раздел | Форма редактирования скидки | Изменение баннера | PATCH | shop/admin/discounts/<id> | - |
| Административный раздел | Перечень баннеров | Удаление баннера | DELETE | shop/admin/discounts/<id> | - |
| Административный раздел | Форма проведения импорта | Выбор параметорв импорта | GET | shop/admin/import | - |
| Административный раздел | Форма проведения импорта | Нажатие на кнопку "Запустить импорт" | GET | shop/admin/start_import | - |
