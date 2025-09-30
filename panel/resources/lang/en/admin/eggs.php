<?php

return [
    // Page Titles
    'nests_eggs' => 'Nests → Egg',
    'view_egg' => 'Nests → Egg: :name',
    
    // Navigation
    'breadcrumb_admin' => 'Admin',
    'breadcrumb_nests' => 'Nests',
    'configuration' => 'Configuration',
    'variables' => 'Variables',
    'install_script' => 'Install Script',
    
    // Import/Export
    'egg_file' => 'Egg File',
    'egg_file_help' => 'If you would like to replace settings for this Egg by uploading a new JSON file, simply select it here and press "Update Egg". This will not change any existing startup strings or Docker images for existing servers.',
    'update_egg' => 'Update Egg',
    'export' => 'Export',
    
    // Configuration Section
    'configuration_title' => 'Configuration',
    'name' => 'Name',
    'name_help' => 'A simple, human-readable name to use as an identifier for this Egg.',
    'uuid' => 'UUID',
    'uuid_help' => 'This is the globally unique identifier for this Egg which the Daemon uses as an identifier.',
    'author' => 'Author',
    'author_help' => 'The author of this version of the Egg. Uploading a new Egg configuration from a different author will change this.',
    'description' => 'Description',
    'description_help' => 'A description of this Egg that will be displayed throughout the Panel as needed.',
    'startup_command' => 'Startup Command',
    'startup_command_help' => 'The default startup command that should be used for new servers using this Egg.',
    'docker_images' => 'Docker Images',
    'docker_images_help' => 'The docker images available to servers using this egg. Enter one per line. Users will be able to select from this list of images if more than one value is provided. Optionally, a display name may be provided by prefixing the image with the name followed by a pipe character, and then the image URL. Example: <code>Display Name|ghcr.io/my/egg</code>',
    'force_outgoing_ip' => 'Force Outgoing IP',
    'force_outgoing_ip_help' => 'Forces all outgoing network traffic to have its Source IP NATed to the IP of the server\'s primary allocation IP. Required for certain games to work properly when the Node has multiple public IP addresses.<br><strong>Enabling this option will disable internal networking for any servers using this egg, causing them to be unable to internally access other servers on the same node.</strong>',
    
    // Process Management Section
    'process_management' => 'Process Management',
    'process_management_warning' => 'The following configuration options should not be edited unless you understand how this system works. If wrongly modified it is possible for the daemon to break.',
    'process_management_info' => 'All fields are required unless you select a separate option from the \'Copy Settings From\' dropdown, in which case fields may be left blank to use the values from that Egg.',
    'copy_settings_from' => 'Copy Settings From',
    'copy_settings_help' => 'If you would like to default to settings from another Egg select it from the menu above.',
    'none' => 'None',
    'stop_command' => 'Stop Command',
    'stop_command_help' => 'The command that should be sent to server processes to stop them gracefully. If you need to send a <code>SIGINT</code> you should enter <code>^C</code> here.',
    'log_configuration' => 'Log Configuration',
    'log_configuration_help' => 'This should be a JSON representation of where log files are stored, and whether or not the daemon should be creating custom logs.',
    'configuration_files' => 'Configuration Files',
    'configuration_files_help' => 'This should be a JSON representation of configuration files to modify and what parts should be changed.',
    'start_configuration' => 'Start Configuration',
    'start_configuration_help' => 'This should be a JSON representation of what values the daemon should be looking for when booting a server to determine completion.',
    
    // Actions
    'save' => 'Save',
    'delete_egg' => 'Delete Egg',
    'create' => 'Create',
    
    // JavaScript Messages
    'delete_egg_hover' => 'Delete Egg',
    'delete_variable_hover' => 'Delete Variable',
    
    // New Egg Page
    'new_egg' => 'New Egg',
    'new_egg_description' => 'Create a new Egg to assign to servers.',
    'associated_nest' => 'Associated Nest',
    'associated_nest_help' => 'Think of a Nest as a category. You can put multiple Eggs in a nest, but consider putting only Eggs that are related to each other in each Nest.',
    'name_placeholder' => 'Name',
    'description_placeholder' => 'Description',
    'docker_image_placeholder' => 'Docker Images',
    'docker_image_help_new' => 'The docker images available to servers using this egg. Enter one per line. Users will be able to select from this list of images if more than one value is provided.',
    'startup_placeholder' => 'Startup Command',
    'startup_help_new' => 'The default startup command that should be used for new servers created with this Egg. You can change this per-server as needed.',
    'process_management_info_new' => 'All fields are required unless you select a separate option from the \'Copy Settings From\' dropdown, in which case fields may be left blank to use the values from that option.',
    'copy_from_none' => 'None',
    'copy_from_help' => 'If you would like to default to settings from another Egg select it from the dropdown above.',
    'config_stop' => 'Stop Command',
    'config_logs' => 'Log Configuration',
    'config_files' => 'Configuration Files',
    'config_startup' => 'Start Configuration',
    'create' => 'Create',
    
    // Variables Page
    'managing_variables' => 'Managing variables for this Egg.',
    'create_new_variable' => 'Create New Variable',
    'environment_variable' => 'Environment Variable',
    'default_value' => 'Default Value',
    'variable_access_help' => 'This variable can be accessed in the startup command by using <code>:var</code>.',
    'variable_access_help_new' => 'This variable can be accessed in the startup command by entering <code>@{{environment variable value}}</code>.',
    'permissions' => 'Permissions',
    'users_can_view' => 'Users Can View',
    'users_can_edit' => 'Users Can Edit',
    'input_rules' => 'Input Rules',
    'input_rules_help' => 'These rules are defined using standard <a href="https://laravel.com/docs/5.7/validation#available-validation-rules" target="_blank">Laravel Framework validation rules</a>.',
    'close' => 'Close',
    'create_variable' => 'Create Variable',
    'required' => 'Required',
    
    // Scripts Page
    'manage_install_script' => 'Manage the install script for this Egg.',
    'copy_script_from_warning' => 'This service option is copying installation scripts and container options from <a href=":link">:name</a>. Any changes you make to this script will not apply unless you select "None" from the dropdown box below.',
    'copy_script_from' => 'Copy Script From',
    'copy_script_help' => 'If selected, script above will be ignored and script from selected option will be used in place.',
    'script_container' => 'Script Container',
    'script_container_help' => 'Docker container to use when running this script for the server.',
    'script_entrypoint' => 'Script Entrypoint Command',
    'script_entrypoint_help' => 'The entrypoint command to use for this script.',
    'rely_on_script' => 'The following service options rely on this script:',
    'none_rely' => 'none',
];