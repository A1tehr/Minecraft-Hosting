<?php

return [
    // Page Titles
    'settings' => 'Settings',
    'advanced_settings' => 'Advanced Settings',
    'mail_settings' => 'Mail Settings',

    // Headers and Descriptions
    'panel_settings_title' => 'Panel Settings',
    'panel_settings_description' => 'Configure Pterodactyl to your liking.',
    'advanced_description' => 'Configure advanced settings for Pterodactyl.',
    'mail_description' => 'Configure how Pterodactyl should handle sending emails.',
    'email_settings' => 'Email Settings',
    'environment_only_notice' => 'Your Panel is currently configured to read settings from the environment only. You will need to set <code>APP_ENVIRONMENT_ONLY=false</code> in your environment file in order to load settings dynamically.',

    // Navigation
    'breadcrumb_admin' => 'Admin',
    'breadcrumb_settings' => 'Settings',

    // Basic Settings
    'company_name' => 'Company Name',
    'company_name_help' => 'This is the name that is used throughout the panel and in emails sent to clients.',
    'require_2fa' => 'Require 2-Factor Authentication',
    'require_2fa_help' => 'If enabled, any account falling into the selected grouping will be required to have 2-Factor authentication enabled to use the Panel.',
    'not_required' => 'Not Required',
    'admin_only' => 'Admin Only',
    'all_users' => 'All Users',
    'default_language' => 'Default Language',
    'default_language_help' => 'The default language to use when rendering UI components.',

    // reCAPTCHA Settings
    'recaptcha' => 'reCAPTCHA',
    'status' => 'Status',
    'enabled' => 'Enabled',
    'disabled' => 'Disabled',
    'recaptcha_help' => 'If enabled, login forms and password reset forms will do a silent captcha check and display a visible captcha if needed.',
    'site_key' => 'Site Key',
    'secret_key' => 'Secret Key',
    'secret_key_help' => 'Used for communication between your site and Google. Be sure to keep it a secret.',
    'recaptcha_warning' => 'You are currently using reCAPTCHA keys that were shipped with this Panel. For improved security it is recommended to <a href="https://www.google.com/recaptcha/admin">generate new invisible reCAPTCHA keys</a> that tied specifically to your website.',

    // HTTP Connection Settings
    'http_connections' => 'HTTP Connections',
    'connection_timeout' => 'Connection Timeout',
    'connection_timeout_help' => 'The amount of time in seconds to wait for a connection to be opened before throwing an error.',
    'request_timeout' => 'Request Timeout',
    'request_timeout_help' => 'The amount of time in seconds to wait for a request to be completed before throwing an error.',

    // Auto Allocation Settings
    'auto_allocation' => 'Automatic Allocation Creation',
    'auto_allocation_help' => 'If enabled users will have the option to automatically create new allocations for their server via the frontend.',
    'starting_port' => 'Starting Port',
    'starting_port_help' => 'The starting port in the range that can be automatically allocated.',
    'ending_port' => 'Ending Port',
    'ending_port_help' => 'The ending port in the range that can be automatically allocated.',

    // Mail Settings
    'smtp_limited' => 'This interface is limited to instances using SMTP as the mail driver. Please either use <code>php artisan p:environment:mail</code> command to update your email settings, or set <code>MAIL_DRIVER=smtp</code> in your environment file.',
    'smtp_host' => 'SMTP Host',
    'smtp_host_help' => 'Enter the SMTP server address that mail should be sent through.',
    'smtp_port' => 'SMTP Port',
    'smtp_port_help' => 'Enter the SMTP server port that mail should be sent through.',
    'encryption' => 'Encryption',
    'encryption_none' => 'None',
    'encryption_tls' => 'Transport Layer Security (TLS)',
    'encryption_ssl' => 'Secure Sockets Layer (SSL)',
    'encryption_help' => 'Select the type of encryption to use when sending mail.',
    'smtp_username' => 'Username',
    'smtp_username_help' => 'The username to use when connecting to the SMTP server.',
    'smtp_password' => 'Password',
    'smtp_password_help' => 'The password to use in conjunction with the SMTP username. Leave blank to continue using the existing password. To set the password to an empty value enter <code>!e</code> into the field.',
    'mail_from' => 'Mail From',
    'mail_from_help' => 'Enter an email address that all outgoing emails will originate from.',
    'mail_from_name' => 'Mail From Name',
    'mail_from_name_help' => 'The name that emails should appear to come from.',

    // Actions
    'save' => 'Save',
    'test' => 'Test',

    // JavaScript Messages
    'test_mail_title' => 'Test Mail Settings',
    'test_mail_text' => 'Click "Test" to begin the test.',
    'test_success_title' => 'Success',
    'test_success_text' => 'The test message was sent successfully.',
    'save_success_title' => 'Success',
    'save_success_text' => 'Mail settings have been updated successfully and the queue worker was restarted to apply these changes.',
    'error_title' => 'Whoops!',
    'error_prefix' => 'An error occurred while attempting to ',
    'error_save' => 'save',
    'error_test' => 'test',
    'error_suffix' => ' mail settings: ',
];