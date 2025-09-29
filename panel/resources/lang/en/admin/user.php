<?php

return [
    // Page Titles
    'list_users' => 'List Users',
    'create_user' => 'Create User',
    'manage_user' => 'Manager User: :username',

    // Headers and Descriptions
    'users_title' => 'Users',
    'users_description' => 'All registered users on the system.',
    'create_description' => 'Add a new user to the system.',
    'user_list' => 'User List',

    // Navigation
    'breadcrumb_admin' => 'Admin',
    'breadcrumb_users' => 'Users',
    'breadcrumb_create' => 'Create',

    // Form Fields
    'email' => 'Email',
    'username' => 'Username',
    'client_first_name' => 'Client First Name',
    'client_last_name' => 'Client Last Name',
    'default_language' => 'Default Language',
    'default_language_help' => 'The default language to use when rendering the Panel for this user.',
    'password' => 'Password',
    'password_help' => 'Leave blank to keep this user\'s password the same. User will not receive any notification if password is changed.',
    'password_optional' => 'Password',
    'administrator' => 'Administrator',
    'admin_help' => 'Setting this to \'Yes\' gives a user full administrative access.',

    // Table Headers
    'id' => 'ID',
    'client_name' => 'Client Name',
    'servers_owned' => 'Servers Owned',
    'servers_owned_help' => 'Servers that this user is marked as the owner of.',
    'can_access' => 'Can Access',
    'can_access_help' => 'Servers that this user can access because they are marked as a subuser.',

    // Sections
    'identity' => 'Identity',
    'permissions' => 'Permissions',
    'delete_user' => 'Delete User',

    // Actions
    'search_placeholder' => 'Search',
    'create_new' => 'Create New',
    'create_user_button' => 'Create User',
    'update_user' => 'Update User',
    'delete_user_button' => 'Delete User',

    // Messages
    'delete_warning' => 'There must be no servers associated with this account in order for it to be deleted.',
    'password_creation_info' => 'Providing a user password is optional. New user emails prompt users to create a password the first time they login. If a password is provided here you will need to find a different method of providing it to the user.',
    'generated_password' => 'Generated Password:',

    'exceptions' => [
        'user_has_servers' => 'Cannot delete a user with active servers attached to their account. Please delete their servers before continuing.',
    ],
    'notices' => [
        'account_created' => 'Account has been created successfully.',
        'account_updated' => 'Account has been successfully updated.',
    ],
];
