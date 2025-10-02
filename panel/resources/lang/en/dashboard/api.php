<?php

return [
    'title' => 'Account API',
    'create_key' => [
        'title' => 'Create API Key',
        'description_label' => 'Description',
        'description_help' => 'A description of this API key.',
        'allowed_ips_label' => 'Allowed IPs',
        'allowed_ips_help' => 'Leave blank to allow any IP address to use this API key, otherwise provide each IP address on a new line.',
        'button' => 'Create',
    ],
    'keys_list' => [
        'title' => 'API Keys',
        'loading' => 'Loading...',
        'no_keys' => 'No API keys exist for this account.',
        'last_used' => 'Last used',
        'never' => 'Never',
    ],
    'delete' => [
        'title' => 'Delete API Key',
        'confirm' => 'Delete Key',
        'description' => 'All requests using the :identifier key will be invalidated.',
    ],
    'modal' => [
        'title' => 'Your API Key',
        'description' => 'The API key you have requested is shown below. Please store this in a safe location, it will not be shown again.',
        'close' => 'Close',
    ],
];