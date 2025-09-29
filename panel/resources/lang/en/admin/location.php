<?php

return [
    // Page Titles
    'locations' => 'Locations',
    'location_list' => 'Location List', 
    'create_location' => 'Create Location',
    'location_details' => 'Location Details',
    
    // Headers and Descriptions
    'locations_description' => 'All locations that nodes can be assigned to for easier categorization.',
    'view_location' => 'Locations → View → :name',
    
    // Navigation
    'breadcrumb_admin' => 'Admin',
    'breadcrumb_locations' => 'Locations',
    
    // Table Headers
    'id' => 'ID',
    'short_code' => 'Short Code',
    'description' => 'Description',
    'nodes' => 'Nodes',
    'servers' => 'Servers',
    'name' => 'Name',
    'fqdn' => 'FQDN',
    
    // Form Fields
    'short_code_help' => 'A short identifier used to distinguish this location from others. Must be between 1 and 60 characters, for example, <code>us.nyc.lvl3</code>.',
    'description_help' => 'A longer description of this location. Must be less than 191 characters.',
    
    // Actions
    'create_new' => 'Create New',
    'save' => 'Save',
    'cancel' => 'Cancel',
    'create' => 'Create',
    
    // Modal
    'modal_title' => 'Create Location',
    
    'exceptions' => [
        'location_has_nodes' => 'Cannot delete a location that has active nodes assigned to it.',
    ],
    'notices' => [
        'location_deleted' => 'Location was successfully deleted from the panel.',
        'location_created' => 'Location has been created successfully.',  
        'location_updated' => 'Location has been updated successfully.',
    ],
];