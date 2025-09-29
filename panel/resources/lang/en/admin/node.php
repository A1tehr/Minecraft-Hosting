<?php

return [
    // Page Elements
    'title' => 'Nodes → New',
    'header' => 'New Node',
    'header_sub' => 'Create a new local or remote node for servers to be installed to.',
    'breadcrumb_admin' => 'Admin',
    'breadcrumb_nodes' => 'Nodes',
    'breadcrumb_new' => 'New',
    
    // Form Sections
    'basic_details' => 'Basic Details',
    'configuration' => 'Configuration',
    
    // Form Fields
    'name' => 'Name',
    'name_help' => 'Character limits: <code>a-zA-Z0-9_.-</code> and <code>[Space]</code> (min 1, max 100 characters).',
    'description' => 'Description',
    'location' => 'Location',
    'node_visibility' => 'Node Visibility',
    'public' => 'Public',
    'private' => 'Private',
    'private_help' => 'By setting a node to <code>private</code> you will be denying the ability to auto-deploy to this node.',
    'fqdn' => 'FQDN',
    'fqdn_help' => 'Please enter domain name (e.g <code>node.example.com</code>) to be used for connecting to the daemon. An IP address may be used <em>only</em> if you are not using SSL for this node.',
    'ssl_connection' => 'Communicate Over SSL',
    'use_ssl' => 'Use SSL Connection',
    'use_http' => 'Use HTTP Connection',
    'ssl_warning' => 'Your Panel is currently configured to use a secure connection. In order for browsers to connect to your node it <strong>must</strong> use a SSL connection.',
    'ssl_recommendation' => 'In most cases you should select to use a SSL connection. If using an IP Address or you do not wish to use SSL at all, select a HTTP connection.',
    'behind_proxy' => 'Behind Proxy',
    'not_behind_proxy' => 'Not Behind Proxy',
    'behind_proxy_help' => 'Is this node behind a proxy or load balancer?',
    'proxy_help' => 'If you are running the daemon behind a proxy such as Cloudflare, select this to have the daemon skip looking for certificates on boot.',
    'daemon_base_help' => 'Enter the directory where server files should be stored. <strong>If you use OVH you should check your partition scheme. You may need to use <code>/home/daemon-data</code> to have enough space.</strong>',
    'memory_help' => 'Enter the total amount of memory available for new servers. If you would like to allow overallocation of memory enter the percentage that you want to allow. To disable checking for overallocation enter <code>-1</code> into the field. Entering <code>0</code> will prevent creating new servers if it would put the node over the limit.',
    'disk_help' => 'Enter the total amount of disk space available for new servers. If you would like to allow overallocation of disk space enter the percentage that you want to allow. To disable checking for overallocation enter <code>-1</code> into the field. Entering <code>0</code> will prevent creating new servers if it would put the node over the limit.',
    'daemon_port_help' => 'The daemon runs its own SFTP management container and does not use the SSHd process on the main physical server. <Strong>Do not use the same port that you have assigned for your physical server\'s SSH process.</strong> If you will be running the daemon behind CloudFlare&reg; you should set the daemon port to <code>8443</code> to allow websocket proxying over SSL.',
    
    // Configuration Fields
    'daemon_base' => 'Daemon Server File Directory',
    'memory' => 'Total Memory',
    'memory_overallocate' => 'Memory Over-Allocation',
    'disk' => 'Total Disk Space',
    'disk_overallocate' => 'Disk Over-Allocation',
    'daemon_port' => 'Daemon Port',
    'daemon_sftp_port' => 'Daemon SFTP Port',
    'create_node' => 'Create Node',
    
    'validation' => [
        'fqdn_not_resolvable' => 'The FQDN or IP address provided does not resolve to a valid IP address.',
        'fqdn_required_for_ssl' => 'A fully qualified domain name that resolves to a public IP address is required in order to use SSL for this node.',
    ],
    'notices' => [
        'allocations_added' => 'Allocations have successfully been added to this node.',
        'node_deleted' => 'Node has been successfully removed from the panel.',
        'location_required' => 'You must have at least one location configured before you can add a node to this panel.',
        'node_created' => 'Successfully created new node. You can automatically configure the daemon on this machine by visiting the \'Configuration\' tab. <strong>Before you can add any servers you must first allocate at least one IP address and port.</strong>',
        'node_updated' => 'Node information has been updated. If any daemon settings were changed you will need to reboot it for those changes to take effect.',
        'unallocated_deleted' => 'Deleted all un-allocated ports for <code>:ip</code>.',
    ],
];
