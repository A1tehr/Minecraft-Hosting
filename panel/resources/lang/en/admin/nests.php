<?php

return [
    // Page Titles
    'nests' => 'Nests',
    'new_nest' => 'New Nest',
    'nest_configuration' => 'Nest Configuration',
    
    // Headers and Descriptions
    'nest_description' => 'Configure a new nest to deploy to all nodes.',
    'nest_details' => 'Configure nest details.',
    
    // Navigation
    'breadcrumb_admin' => 'Admin',
    'breadcrumb_nests' => 'Nests',
    'breadcrumb_new' => 'New',
    
    // Form Fields
    'name' => 'Name',
    'name_description' => 'This should be a descriptive category name that encompasses all of the eggs within the nest.',
    'description' => 'Description',
    
    // Actions
    'save' => 'Save',
    'create' => 'Create',
    'delete_nest' => 'Delete Nest',
    
    // View Nest Page
    'view_nest' => 'Nests → :name',
    'nest_id' => 'Nest ID',
    'nest_id_help' => 'A unique ID used for identification of this nest internally and through the API.',
    'author' => 'Author',
    'author_help' => 'The author of this service option. Please direct questions and issues to them unless this is an official option authored by <code>support@pterodactyl.io</code>.',
    'uuid' => 'UUID',
    'uuid_help' => 'A UUID that all servers using this option are assigned for identification purposes.',
    'nest_eggs' => 'Nest Eggs',
    'egg_id' => 'ID',
    'egg_name' => 'Name',
    'egg_description' => 'Description',
    'servers' => 'Servers',
    'new_egg' => 'New Egg',
    
    'notices' => [
        'created' => 'A new nest, :name, has been successfully created.',
        'deleted' => 'Successfully deleted the requested nest from the Panel.',
        'updated' => 'Successfully updated the nest configuration options.',
    ],
    'eggs' => [
        'notices' => [
            'imported' => 'Successfully imported this Egg and its associated variables.',
            'updated_via_import' => 'This Egg has been updated using the file provided.',
            'deleted' => 'Successfully deleted the requested egg from the Panel.',
            'updated' => 'Egg configuration has been updated successfully.',
            'script_updated' => 'Egg install script has been updated and will run whenever servers are installed.',
            'egg_created' => 'A new egg was laid successfully. You will need to restart any running daemons to apply this new egg.',
        ],
    ],
    'variables' => [
        'notices' => [
            'variable_deleted' => 'The variable ":variable" has been deleted and will no longer be available to servers once rebuilt.',
            'variable_updated' => 'The variable ":variable" has been updated. You will need to rebuild any servers using this variable in order to apply changes.',
            'variable_created' => 'New variable has successfully been created and assigned to this egg.',
        ],
    ],
];
