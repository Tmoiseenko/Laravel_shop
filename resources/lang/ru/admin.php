<?php
return [
    'settings' => [
        'Name' => 'Настройки',
        'Description' => 'Страница изменения настроек',
        'Edit' => 'Редактировать',
        'Contacts' => 'Контакты',
        'Delivery' => 'Доставка',
        'User' => 'Пользователь',
        'Title' => 'Название',
        'Value' => 'Значение',
        'Action' => 'Действия',
        'updated' => 'Успешно обновлено',
        'editing' => 'Редактирование опции',
        'Update' => 'Изменить',
        'configuration' => 'Конфигурация',
        'general' => 'Основные настройки',
    ],

    'menu' => [
        'elements' => 'Сущности',
        'right' => 'Все права защищены.',
    ],

    'import' =>[
        'panel_name' => 'Импорт',
        'screen_name' => 'Импорт базы данных',
        'screen_description' => ''
    ],
    /*
      |--------------------------------------------------------------------------
      | Banner slaider Admin panel Language Lines
      |--------------------------------------------------------------------------
      */

    'banners'=>[
        'panel_name' => 'Баннеры',
        'manage_banners' => 'Управление баннерами',
        'add_new_banner' => 'Добавить новый баннер',
        'edit_banner' => 'Редактирование баннера',
        'title' => 'Заголовок',
        'subtitle' => 'Подзаголовок',
        'button_text' => 'Текст кнопки',
        'href' => 'Ссылка для кнопки',
        'is_active' => 'Активировать баннер',
        'image' => 'Изображение баннера',
        'title_placeholder' => 'Введите заголовок для баннера',
        'subtitle_placeholder' => 'Введите подзаголовок для баннера',
        'button_text_placeholder' => 'Введите текст кнопки для баннера',
        'href_placeholder' => 'Введите ссылку для кнопки баннера',
        'is_active_placeholder' => 'Если флаг установлен, баннер будет отображаться',
        'image_help' => 'Изображение может иметь максимальную высоту 454px и ширину 735px',
        'success_info' => 'Вы успешно создали баннер.',
        'delete_info' => 'Вы успешно удалили баннер.',
        'active' => 'Активность',
    ],

    // permissions
    'permissions' => [
        'customer' => [
            'group_name' => 'Покупатель',
            'discounts' => 'Доступ к просмотру скидок на портале'
        ]
    ],

    'category' => [
        'panel_name' => 'Категории',
        'name_placeholder' => 'Введите название категории',
        'screen_name' => 'Управление категориями',
        'screen_description' => 'Категории товаров',
        'add_new' => 'Добавить новую категорию',
        'edit' => 'Редактировать/Создать категорию',
        'title' => 'Категория',
        'parent' => 'Родителькая категория',
        'edit_category' => 'Редактирование/Создание категории',
        'icon' => 'Иконка категории',
        'icon_help' => 'Выберите изображение иконки которое будет отображаться в меню',
        'success_info' => 'Вы успешно создали категорию.',
        'delete_info' => 'Вы успешно удалили категорию.',
        'image_id' => 'Выберите изображение для категории.',
        'is_active' => 'Отметьте чекбокс если категория активна.',
        'slug' => 'Введите симаольныей код для категории.',
        'slug_placeholder' => 'Симваольный код должен быть написан через тире.',
    ],

    'products' => [
        'panel_name' => 'Товары',
        'screen_name' => 'Управление товарами',
        'screen_description' => 'Список товаров'
    ],

    'sellers' => [
        'panel_name' => 'Продавцы',
        'screen_name' => 'Управление продавцами',
        'screen_description' => 'Список продавцов'
    ],

    'discounts' => [
        'panel_name' => 'Скидки',
        'list' => 'Список скидок',
        'screen_name' => 'Управление скидками',
        'screen_description' => 'Список скидок',
        'add_discount' => 'Добавить скидку',
        'value' => 'Значение',
        'method_type' => 'Метод скидки',
        'category_type' => 'Вид скидки',
        'not_selected' => 'Не выбрано',
        'weight' => 'Вес',
        'minimal_cost' => 'Минимальная стоимость',
        'maximum_cost' => 'Максимальная стоимость',
        'minimal_qty' => 'Минимальное количество',
        'maximum_qty' => 'Максимальное количество',
        'start_at' => 'Дата начала',
        'end_at' => 'Дата окончания',
        'active' => 'Активна',
        'controls' => 'Управление',
        'edit' => 'Редактировать',
        'category' => [
            'product' => 'Товары',
            'groups' => [
                'title' => "Группы",
                'a' => "Группа а",
                'b' => "Группа б",
            ],
            'cart' => [
                'title' => 'Корзина',
            ]
        ]
    ],

    'orders' => [
        'panel_name' => 'Заказы',
        'screen_name' => 'Управление заказами',
        'screen_description' => 'Список заказов'
    ],

];
