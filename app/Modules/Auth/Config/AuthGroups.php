<?php

namespace App\Modules\Auth\Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    public array $groups = [
        'customer' => [
            'title'       => 'Customer',
            'description' => 'Standard user who can browse the catalog, place orders during open periods, and manage their personal profile.',
        ],
        'producer' => [
            'title'       => 'Producer',
            'description' => 'User who can create and manage products, update stock information, and receive notifications when customers place orders for their products.',
        ],
        'manager' => [
            'title'       => 'Manager',
            'description' => 'User responsible for managing order periods, monitoring customer orders, and coordinating with producers. Has limited administrative rights but cannot change system-wide settings.',
        ],
        'admin' => [
            'title'       => 'Administrator',
            'description' => 'Superuser with full access to the application. Can manage users, roles, system settings, notifications, and oversee all other modules.',
        ],
    ];
    public string $defaultGroup = 'customer';
}
