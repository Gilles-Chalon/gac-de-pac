<?php

namespace App\Modules\Customer\Config;

use CodeIgniter\Config\BaseConfig;

class Customer extends BaseConfig
{
    public $views = [
        'layout' => 'App\Modules\Customer\Views\layouts\profile_layout',
        'dashboard' => 'App\Modules\Customer\Views\profiles\dashboard',
        'edit' => 'App\Modules\Customer\Views\profiles\edit',
        'password' => 'App\Modules\Customer\Views\profiles\password',
        'history' => 'App\Modules\Customer\Views\profiles\history',
    ];
}
