<?php

/**
 * Содержит все строки перевода для различных событий журнала активности.
 * Они должны быть сгруппированы по значению перед двоеточием (:)
 * в названии события. Если двоеточия нет, строки должны находиться
 * на верхнем уровне.
 */
return [
    'auth' => [
        'fail' => 'Неудачная попытка входа',
        'success' => 'Вход выполнен',
        'password-reset' => 'Сброс пароля',
        'reset-password' => 'Запрос сброса пароля',
        'checkpoint' => 'Запрошена двухфакторная аутентификация',
        'recovery-token' => 'Использован резервный токен двухфакторной аутентификации',
        'token' => 'Пройдена проверка двухфакторной аутентификации',
        'ip-blocked' => 'Заблокирован запрос с неразрешённого IP-адреса для :identifier',
        'sftp' => [
            'fail' => 'Неудачная попытка входа по SFTP',
        ],
    ],
    'user' => [
        'account' => [
            'email-changed' => 'Изменён email с :old на :new',
            'password-changed' => 'Пароль изменён',
        ],
        'api-key' => [
            'create' => 'Создан новый API-ключ :identifier',
            'delete' => 'Удалён API-ключ :identifier',
        ],
        'ssh-key' => [
            'create' => 'Добавлен SSH-ключ :fingerprint к аккаунту',
            'delete' => 'Удалён SSH-ключ :fingerprint из аккаунта',
        ],
        'two-factor' => [
            'create' => 'Включена двухфакторная аутентификация',
            'delete' => 'Отключена двухфакторная аутентификация',
        ],
    ],
    'server' => [
        'reinstall' => 'Переустановлен сервер',
        'console' => [
            'command' => 'Выполнена команда «:command» на сервере',
        ],
        'power' => [
            'start' => 'Запущен сервер',
            'stop' => 'Остановлен сервер',
            'restart' => 'Перезапущен сервер',
            'kill' => 'Принудительно завершён процесс сервера',
        ],
        'backup' => [
            'download' => 'Скачана резервная копия :name',
            'delete' => 'Удалена резервная копия :name',
            'restore' => 'Восстановлена резервная копия :name (удалённые файлы: :truncate)',
            'restore-complete' => 'Завершено восстановление резервной копии :name',
            'restore-failed' => 'Не удалось завершить восстановление резервной копии :name',
            'start' => 'Начато создание новой резервной копии :name',
            'complete' => 'Резервная копия :name помечена как завершённая',
            'fail' => 'Резервная копия :name помечена как неудачная',
            'lock' => 'Резервная копия :name заблокирована',
            'unlock' => 'Резервная копия :name разблокирована',
        ],
        'database' => [
            'create' => 'Создана новая база данных :name',
            'rotate-password' => 'Пароль обновлён для базы данных :name',
            'delete' => 'Удалена база данных :name',
        ],
        'file' => [
            'compress_one' => 'Сжат файл :directory:file',
            'compress_other' => 'Сжато :count файлов в :directory',
            'read' => 'Просмотрено содержимое файла :file',
            'copy' => 'Создана копия файла :file',
            'create-directory' => 'Создана директория :directory:name',
            'decompress' => 'Распакованы файлы :files в :directory',
            'delete_one' => 'Удалён файл :directory:files.0',
            'delete_other' => 'Удалено :count файлов в :directory',
            'download' => 'Скачан файл :file',
            'pull' => 'Скачан удалённый файл с :url в :directory',
            'rename_one' => 'Переименован файл :directory:files.0.from в :directory:files.0.to',
            'rename_other' => 'Переименовано :count файлов в :directory',
            'write' => 'Записано новое содержимое в файл :file',
            'upload' => 'Начата загрузка файла',
            'uploaded' => 'Загружен файл :directory:file',
        ],
        'sftp' => [
            'denied' => 'Доступ по SFTP заблокирован из-за недостатка прав',
            'create_one' => 'Создан файл :files.0',
            'create_other' => 'Создано :count новых файлов',
            'write_one' => 'Изменено содержимое файла :files.0',
            'write_other' => 'Изменено содержимое :count файлов',
            'delete_one' => 'Удалён файл :files.0',
            'delete_other' => 'Удалено :count файлов',
            'create-directory_one' => 'Создана директория :files.0',
            'create-directory_other' => 'Создано :count директорий',
            'rename_one' => 'Переименован файл :files.0.from в :files.0.to',
            'rename_other' => 'Переименовано или перемещено :count файлов',
        ],
        'allocation' => [
            'create' => 'Добавлено выделение :allocation к серверу',
            'notes' => 'Обновлены заметки для выделения :allocation с «:old» на «:new»',
            'primary' => 'Установлено выделение :allocation как основное для сервера',
            'delete' => 'Удалено выделение :allocation',
        ],
        'schedule' => [
            'create' => 'Создано расписание :name',
            'update' => 'Обновлено расписание :name',
            'execute' => 'Вручную запущено расписание :name',
            'delete' => 'Удалено расписание :name',
        ],
        'task' => [
            'create' => 'Создана новая задача «:action» для расписания :name',
            'update' => 'Обновлена задача «:action» для расписания :name',
            'delete' => 'Удалена задача для расписания :name',
        ],
        'settings' => [
            'rename' => 'Переименован сервер с :old на :new',
            'description' => 'Изменено описание сервера с :old на :new',
        ],
        'startup' => [
            'edit' => 'Изменена переменная :variable с «:old» на «:new»',
            'image' => 'Образ Docker для сервера обновлён с :old на :new',
        ],
        'subuser' => [
            'create' => 'Добавлен :email в качестве субпользователя',
            'update' => 'Обновлены права субпользователя для :email',
            'delete' => 'Удалён :email из субпользователей',
        ],
    ],
];
