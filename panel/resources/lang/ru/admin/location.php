<?php

return [
    // Page Titles
    'locations' => 'Локации',
    'location_list' => 'Список локаций', 
    'create_location' => 'Создать локацию',
    'location_details' => 'Детали локации',
    
    // Headers and Descriptions
    'locations_description' => 'Все локации, к которым могут быть назначены узлы для упрощения категоризации.',
    'view_location' => 'Локации → Просмотр → :name',
    
    // Navigation
    'breadcrumb_admin' => 'Администрирование',
    'breadcrumb_locations' => 'Локации',
    
    // Table Headers
    'id' => 'ID',
    'short_code' => 'Краткий код',
    'description' => 'Описание',
    'nodes' => 'Узлы',
    'servers' => 'Серверы',
    'name' => 'Название',
    'fqdn' => 'FQDN',
    
    // Form Fields
    'short_code_help' => 'Короткий идентификатор, используемый для отличия этой локации от других. Должен содержать от 1 до 60 символов, например, <code>ru.msk.lvl3</code>.',
    'description_help' => 'Более подробное описание этой локации. Должно содержать менее 191 символа.',
    
    // Actions
    'create_new' => 'Создать новую',
    'save' => 'Сохранить',
    'cancel' => 'Отмена',
    'create' => 'Создать',
    
    // Modal
    'modal_title' => 'Создать локацию',
    
    'exceptions' => [
        'location_has_nodes' => 'Невозможно удалить локацию, к которой назначены активные узлы.',
    ],
    'notices' => [
        'location_deleted' => 'Локация была успешно удалена из панели.',
        'location_created' => 'Локация была успешно создана.',  
        'location_updated' => 'Локация была успешно обновлена.',
    ],
];