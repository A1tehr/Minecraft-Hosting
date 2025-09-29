<?php

return [
    // Page Titles
    'list_servers' => 'List Servers',
    'create_server' => 'Create Server',
    'new_server' => 'New Server',
    'server_management' => 'Server Management',

    // Headers and Descriptions  
    'servers_title' => 'Servers',
    'servers_description' => 'All servers available on the system.',
    'server_list' => 'Server List',
    'create_new' => 'Create New',
    'create_server_desc' => 'Add a new server to the panel.',
    'breadcrumb_create' => 'Create Server',

    // Form Sections
    'core_details' => 'Core Details',
    'allocation_management' => 'Allocation Management',
    'application_feature_limits' => 'Application Feature Limits',
    'resource_management' => 'Resource Management',
    'nest_configuration' => 'Nest Configuration',
    'docker_configuration' => 'Docker Configuration',
    'startup_configuration' => 'Startup Configuration',
    'service_variables' => 'Service Variables',

    // Basic Fields
    'server_name' => 'Server Name',
    'server_name_help' => 'Character limits: <code>a-z A-Z 0-9 _ - .</code> and <code>[Space]</code>.',
    'server_owner' => 'Server Owner',
    'server_owner_help' => 'Email address of the Server Owner.',
    'server_description' => 'Server Description',
    'server_description_help' => 'A brief description of this server.',
    'start_when_installed' => 'Start Server when Installed',

    // Allocation Fields
    'node' => 'Node',
    'node_help' => 'The node which this server will be deployed to.',
    'default_allocation' => 'Default Allocation',
    'default_allocation_help' => 'The main allocation that will be assigned to this server.',
    'additional_allocations' => 'Additional Allocation(s)',
    'additional_allocations_help' => 'Additional allocations to assign to this server on creation.',

    // Limits
    'database_limit' => 'Database Limit',
    'database_limit_help' => 'The total number of databases a user is allowed to create for this server.',
    'allocation_limit' => 'Allocation Limit',
    'allocation_limit_help' => 'The total number of allocations a user is allowed to create for this server.',
    'backup_limit' => 'Backup Limit',
    'backup_limit_help' => 'The total number of backups that can be created for this server.',

    // Resource Fields
    'cpu_limit' => 'CPU Limit',
    'cpu_limit_help' => 'If you do not want to limit CPU usage, set the value to <code>0</code>. To determine a value, take the number of threads and multiply it by 100. For example, on a quad core system without hyperthreading <code>(4 * 100 = 400)</code> there is <code>400%</code> available. To limit a server to using half of a single thread, you would set the value to <code>50</code>. To allow a server to use up to two threads, set the value to <code>200</code>.',
    'cpu_pinning' => 'CPU Pinning',
    'cpu_pinning_help' => '<strong>Advanced:</strong> Enter the specific CPU threads that this process can run on, or leave blank to allow all threads. This can be a single number, or a comma separated list. Example: <code>0</code>, <code>0-1,3</code>, or <code>0,1,3,4</code>.',
    'memory' => 'Memory',
    'memory_help' => 'The maximum amount of memory allowed for this container. Setting this to <code>0</code> will allow unlimited memory in a container.',
    'swap' => 'Swap',
    'swap_help' => 'Setting this to <code>0</code> will disable swap space on this server. Setting to <code>-1</code> will allow unlimited swap.',
    'disk_space' => 'Disk Space',
    'disk_space_help' => 'This server will not be allowed to boot if it is using more than this amount of space. If a server goes over this limit while running it will be safely stopped and locked until enough space is available. Set to <code>0</code> to allow unlimited disk usage.',
    'block_io_weight' => 'Block IO Weight',
    'block_io_weight_help' => '<strong>Advanced</strong>: The IO performance of this server relative to other <em>running</em> containers on the system. Value should be between <code>10</code> and <code>1000</code>. Please see <a href="https://docs.docker.com/engine/reference/run/#block-io-bandwidth-blkio-constraint" target="_blank">this documentation</a> for more information about it.',
    'enable_oom_killer' => 'Enable OOM Killer',
    'oom_killer_help' => 'Terminates the server if it breaches the memory limits. Enabling OOM killer may cause server processes to exit unexpectedly.',

    // Nest and Egg
    'nest' => 'Nest',
    'nest_help' => 'Select the Nest that this server will be grouped under.',
    'egg' => 'Egg',
    'egg_help' => 'Select the Egg that will define how this server should operate.',
    'skip_egg_install_script' => 'Skip Egg Install Script',
    'skip_egg_install_help' => 'If the selected Egg has an install script attached to it, the script will run during the install. If you would like to skip this step, check this box.',

    // Docker
    'docker_image' => 'Docker Image',
    'docker_image_help' => 'This is the default Docker image that will be used to run this server. Select an image from the dropdown above, or enter a custom image in the text field above.',
    'docker_image_custom_placeholder' => 'Or enter a custom image...',

    // Startup
    'startup_command' => 'Startup Command',
    'startup_command_help' => 'The following data substitutes are available for the startup command: <code>@{{SERVER_MEMORY}}</code>, <code>@{{SERVER_IP}}</code>, and <code>@{{SERVER_PORT}}</code>. They will be replaced with the allocated memory, server IP, and server port respectively.',

    // Buttons
    'create_server_button' => 'Create Server',
    'safely_delete_server' => 'Safely Delete This Server',
    'forcibly_delete_server' => 'Forcibly Delete This Server',
    'update_details' => 'Update Details',

    // Navigation
    'breadcrumb_admin' => 'Admin',
    'breadcrumb_servers' => 'Servers',
    'nav_about' => 'About',
    'nav_details' => 'Details',
    'nav_build_configuration' => 'Build Configuration',
    'nav_startup' => 'Startup',
    'nav_database' => 'Database',
    'nav_mounts' => 'Mounts',
    'nav_manage' => 'Manage',
    'nav_delete' => 'Delete',

    // Table Headers
    'uuid' => 'UUID',
    'owner' => 'Owner',
    'connection' => 'Connection',

    // Server Status
    'suspended' => 'Suspended',
    'installing' => 'Installing',
    'active' => 'Active',
    'install_failed' => 'Install Failed',

    // Search
    'search_servers' => 'Search Servers',

    // Delete Page
    'page_delete_title' => 'Delete',
    'delete_server_description' => 'Delete this server from the panel.',
    'safe_delete_title' => 'Safely Delete Server',
    'safe_delete_description' => 'This action will attempt to delete the server from both the panel and daemon. If either one reports an error the action will be cancelled.',
    'safe_delete_warning' => 'Deleting a server is an irreversible action. <strong>All server data</strong> (including files and users) will be removed from the system.',
    'force_delete_title' => 'Force Delete Server',
    'force_delete_description' => 'This action will attempt to delete the server from both the panel and daemon. If the daemon does not respond, or reports an error the deletion will continue.',
    'force_delete_warning' => 'Deleting a server is an irreversible action. <strong>All server data</strong> (including files and users) will be removed from the system. This method may leave dangling files on your daemon if it reports an error.',
    'delete_confirmation' => 'Are you sure that you want to delete this server? There is no going back, all data will immediately be removed.',

    // Details Page
    'page_details_title' => 'Details',
    'edit_details_description' => 'Edit details for this server including owner and container.',
    'base_information' => 'Base Information',
    'server_name_label' => 'Server Name',
    'server_name_limits' => 'Character limits: <code>a-zA-Z0-9_-</code> and <code>[Space]</code>.',
    'external_identifier' => 'External Identifier',
    'external_identifier_help' => 'Leave empty to not assign an external identifier for this server. The external ID should be unique to this server and not be in use by any other servers.',
    'server_owner_label' => 'Server Owner',
    'server_owner_change_help' => 'You can change the owner of this server by changing this field to an email matching another use on this system. If you do this a new daemon security token will be generated automatically.',
    'server_description_label' => 'Server Description',
    'server_description_brief' => 'A brief description of this server.',

    // Manage Page
    'page_manage_title' => 'Manage',
    'manage_server_description' => 'Additional actions to control this server.',
    'reinstall_server_title' => 'Reinstall Server',
    'reinstall_server_description' => 'This will reinstall the server with the assigned service scripts. <strong>Danger!</strong> This could overwrite server data.',
    'reinstall_server_button' => 'Reinstall Server',
    'server_must_install_properly' => 'Server Must Install Properly to Reinstall',
    'install_status_title' => 'Install Status',
    'install_status_description' => 'If you need to change the install status from uninstalled to installed, or vice versa, you may do so with the button below.',
    'toggle_install_status' => 'Toggle Install Status',
    'suspend_server_title' => 'Suspend Server',
    'suspend_server_description' => 'This will suspend the server, stop any running processes, and immediately block the user from being able to access their files or otherwise manage the server through the panel or API.',
    'suspend_server_button' => 'Suspend Server',
    'unsuspend_server_title' => 'Unsuspend Server',
    'unsuspend_server_description' => 'This will unsuspend the server and restore normal user access.',
    'unsuspend_server_button' => 'Unsuspend Server',
    'transfer_server_title' => 'Transfer Server',
    'transfer_server_description' => 'Transfer this server to another node connected to this panel. <strong>Warning!</strong> This feature has not been fully tested and may have bugs.',
    'transfer_server_button' => 'Transfer Server',
    'transfer_requires_multiple_nodes' => 'Transferring a server requires more than one node to be configured on your panel.',
    'server_being_transferred' => 'This server is currently being transferred to another node. Transfer was initiated at <strong>:datetime</strong>',
    'node_transfer_help' => 'The node which this server will be transferred to.',
    'default_allocation_transfer' => 'Default Allocation',
    'default_allocation_transfer_help' => 'The main allocation that will be assigned to this server.',
    'additional_allocations_transfer' => 'Additional Allocation(s)',
    'additional_allocations_transfer_help' => 'Additional allocations to assign to this server on creation.',
    'confirm_transfer' => 'Confirm',

    'exceptions' => [
        'no_new_default_allocation' => 'You are attempting to delete the default allocation for this server but there is no fallback allocation to use.',
        'marked_as_failed' => 'This server was marked as having failed a previous installation. Current status cannot be toggled in this state.',
        'bad_variable' => 'There was a validation error with the :name variable.',
        'daemon_exception' => 'There was an exception while attempting to communicate with the daemon resulting in a HTTP/:code response code. This exception has been logged. (request id: :request_id)',
        'default_allocation_not_found' => 'The requested default allocation was not found in this server\'s allocations.',
    ],
    'alerts' => [
        'startup_changed' => 'The startup configuration for this server has been updated. If this server\'s nest or egg was changed a reinstall will be occurring now.',
        'server_deleted' => 'Server has successfully been deleted from the system.',
        'server_created' => 'Server was successfully created on the panel. Please allow the daemon a few minutes to completely install this server.',
        'build_updated' => 'The build details for this server have been updated. Some changes may require a restart to take effect.',
        'suspension_toggled' => 'Server suspension status has been changed to :status.',
        'rebuild_on_boot' => 'This server has been marked as requiring a Docker Container rebuild. This will happen the next time the server is started.',
        'install_toggled' => 'The installation status for this server has been toggled.',
        'server_reinstalled' => 'This server has been queued for a reinstallation beginning now.',
        'details_updated' => 'Server details have been successfully updated.',
        'docker_image_updated' => 'Successfully changed the default Docker image to use for this server. A reboot is required to apply this change.',
        'node_required' => 'You must have at least one node configured before you can add a server to this panel.',
        'transfer_nodes_required' => 'You must have at least two nodes configured before you can transfer servers.',
        'transfer_started' => 'Server transfer has been started.',
        'transfer_not_viable' => 'The node you selected does not have the required disk space or memory available to accommodate this server.',
    ],
];
