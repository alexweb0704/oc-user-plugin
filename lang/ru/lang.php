<?php

return [
    'plugin' => [
        'name' => 'User',
        'description' => ''
    ],
    'general' => [
        'sort_order' => 'Ключ сортировки',
        'created_at' => 'Создан в',
        'updated_at' => 'Обновлен в',
        'deleted_at' => 'Удален в',
    ],
    'models' => [
        'user' => [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'username' => 'Логин',
            'email' => 'email',
            'password' => 'Пароль',
            'password_confirmation' => 'Подтверждение пароля',
            'groups' => 'Группы',
            'registered_at' => 'Зарегистрирован в',
            'activated_at' => 'Активирован в',
            'logined_at' => 'Последний вход в',
            'last_seen_at' => 'Последнее посещение в',
            'banned_at' => 'Заблокирован в',
            'dont_setted' => 'не указан',
            'dont_activated' => 'не активирован',
            'dont_login' => 'не входил',
            'dont_last_seen' => 'не посещал',
            'dont_banned' => 'не заблокирован',
            'avatar' => 'Аватар',
            'tabs' => [
                'profile' => 'Профиль'
            ],
        ],
        'group' => [
            'name' => 'Название',
            'code' => 'Код',
            'description' => 'Описание',
            'is_active' => 'Активность',
        ],
    ],
    'controllers' => [
        'users' => [
            'update' => 'Редактировать'
        ],
    ],
    'permissions' => [
        'manage_groups' => 'Управление группами пользователей',
        'manage_users' => 'Управление пользователями',
    ],
    'menu' => [
        'main-menu' => 'Пользователи',
        'users' => 'Пользователи',
        'groups' => 'Группы',
    ],
    'components' => [
        'account' => [
            'name' => 'Аккаунт',
            'description' => 'Компонент аккаунт, для управления пользовательским аккаунтом',
            'redirect' => [
                'title' => 'Перенаправление',
                'description' => 'Выберите страницу для перенаправления',
                'options' => [
                    'refresh' => '- обновить страницу -',
                    'no_redirect' => '- не перенаправлять -',
                ],
            ],
            'types' => [
                'title' => 'Тип формы',
                'description' => 'Тип формы, у плагина есть два типа формы: 1) Рестрация. 2) Авторизация.',
                'options' => [
                    'all' => 'Регистрация/Авторизация',
                    'register' => 'Регистрация',
                    'login' => 'Авторизация',
                ],
            ],
        ],
    ],
    'settings' => [
        'label' => 'FrontEnd пользователи',
        'description' => 'Настройки плагина "Frontend Пользователи" от лаборатории Гиков.',
        'category' => 'Пользователи',
        'loginAttributes' => [
            'label' => 'Авторизация',
            'description' => 'Выберите те поля, по которым могут авторизоваться пользователи',
            'options' => [
                'username' => 'Логин',
                'email' => 'E-mail'
            ],
        ],
        'rememberMe' => [
            'label' => 'Режим "Запомнить меня"',
            'description' => 'От этого режима зависит сессия пользователей',
            'options' => [
                'ask' => 'спросить при авторизации',
                'always' => 'всегда',
                'never' => 'никогда',
            ],
        ],
    ],
];
