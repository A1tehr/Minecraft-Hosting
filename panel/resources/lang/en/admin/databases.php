<?php

return [
    // Page Titles
    'database_hosts' => 'Database Hosts',
    'database_hosts_description' => 'Database hosts that servers can have databases created on.',
    'host_list' => 'Host List',
    'create_new_database_host' => 'Create New Database Host',
    
    // Navigation
    'breadcrumb_admin' => 'Admin',
    'breadcrumb_database_hosts' => 'Database Hosts',
    
    // Actions
    'create_new' => 'Create New',
    'create' => 'Create',
    'cancel' => 'Cancel',
    
    // Table Headers
    'id' => 'ID',
    'name' => 'Name',
    'host' => 'Host',
    'port' => 'Port',
    'username' => 'Username',
    'databases' => 'Databases',
    'node' => 'Node',
    'none' => 'None',
    
    // Form Fields and Help Text
    'name_help' => 'A short identifier used to distinguish this location from others. Must be between 1 and 60 characters, for example, <code>us.nyc.lvl3</code>.',
    'host_help' => 'The IP address or FQDN that should be used when attempting to connect to this MySQL host <em>from the panel</em> to add new databases.',
    'port_help' => 'The port that MySQL is running on for this host.',
    'username_help' => 'The username of an account that has enough permissions to create new users and databases on the system.',
    'password' => 'Password',
    'password_help' => 'The password to the account defined.',
    'linked_node' => 'Linked Node',
    'linked_node_help' => 'This setting does nothing other than default to this database host when adding a database to a server on the selected node.',
    
    // Warnings and Notices
    'grant_option_warning' => 'The account defined for this database host <strong>must</strong> have the <code>WITH GRANT OPTION</code> permission. If the defined account does not have this permission requests to create databases <em>will</em> fail. <strong>Do not use the same account details for MySQL that you have defined for this panel.</strong>',
];