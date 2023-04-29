<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'hotels' => [
        'name' => 'Hotels',
        'index_title' => 'Hotels List',
        'new_title' => 'New Hotel',
        'create_title' => 'Create Hotel',
        'edit_title' => 'Edit Hotel',
        'show_title' => 'Show Hotel',
        'inputs' => [
            'name' => 'Name',
            'address_line_1' => 'Address Line 1',
            'address_line_2' => 'Address Line 2',
            'city' => 'City',
            'country' => 'Country',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'description' => 'Description',
            'long_description' => 'Long Description',
            'active' => 'Active',
        ],
    ],

    'hotel_categories' => [
        'name' => 'Hotel Categories',
        'index_title' => 'HotelCategories List',
        'new_title' => 'New Hotel category',
        'create_title' => 'Create HotelCategory',
        'edit_title' => 'Edit HotelCategory',
        'show_title' => 'Show HotelCategory',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'images' => [
        'name' => 'Images',
        'index_title' => 'Images List',
        'new_title' => 'New Image',
        'create_title' => 'Create Image',
        'edit_title' => 'Edit Image',
        'show_title' => 'Show Image',
        'inputs' => [
            'imageable_id' => 'Imageable Id',
            'imageable_type' => 'Imageable Type',
            'image' => 'Image',
        ],
    ],

    'rooms' => [
        'name' => 'Rooms',
        'index_title' => 'Rooms List',
        'new_title' => 'New Room',
        'create_title' => 'Create Room',
        'edit_title' => 'Edit Room',
        'show_title' => 'Show Room',
        'inputs' => [
            'hotel_id' => 'Hotel',
            'name' => 'Name',
            'count' => 'Count',
            'is_active' => 'Is Active',
            'description' => 'Description',
        ],
    ],

    'rates' => [
        'name' => 'Rates',
        'index_title' => 'Rates List',
        'new_title' => 'New Rate',
        'create_title' => 'Create Rate',
        'edit_title' => 'Edit Rate',
        'show_title' => 'Show Rate',
        'inputs' => [
            'adults' => 'Adults',
            'children' => 'Children',
            'basis' => 'Basis',
            'from' => 'From',
            'to' => 'To',
            'price' => 'Price',
            'hotel_id' => 'Hotel',
            'room_id' => 'Room',
        ],
    ],

    'hotel_amenities' => [
        'name' => 'Hotel Amenities',
        'index_title' => 'HotelAmenities List',
        'new_title' => 'New Hotel amenity',
        'create_title' => 'Create HotelAmenity',
        'edit_title' => 'Edit HotelAmenity',
        'show_title' => 'Show HotelAmenity',
        'inputs' => [
            'name' => 'Name',
            'active' => 'Active',
        ],
    ],

    'hotel_services' => [
        'name' => 'Hotel Services',
        'index_title' => 'HotelServices List',
        'new_title' => 'New Hotel service',
        'create_title' => 'Create HotelService',
        'edit_title' => 'Edit HotelService',
        'show_title' => 'Show HotelService',
        'inputs' => [
            'hotel_id' => 'Hotel',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
        ],
    ],

    'vehicles' => [
        'name' => 'Vehicles',
        'index_title' => 'Vehicles List',
        'new_title' => 'New Vehicle',
        'create_title' => 'Create Vehicle',
        'edit_title' => 'Edit Vehicle',
        'show_title' => 'Show Vehicle',
        'inputs' => [
            'type' => 'Type',
            'max_occupancy' => 'Max Occupancy',
            'baggages' => 'Baggages',
            'price_per_km' => 'Price Per Km',
            'first_km' => 'First Km',
        ],
    ],
];
