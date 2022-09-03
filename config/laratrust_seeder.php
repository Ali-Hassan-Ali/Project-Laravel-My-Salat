<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [

        'admin' => [
            'admins'     => 'c,r,u,d',
            'users'      => 'c,r,u,d',
            'owners'     => 'c,r,u,d,s',
            'categories' => 'c,r,u,d',
            'payments'   => 'c,r,u,d',
            'services'   => 'c,r,u,d',
            'bookings'   => 'c,r,u,d',
            'orders'     => 'c,r,u,d',
        ],
        'user' => [],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        's' => 'show'
    ]
];
