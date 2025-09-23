<?php

namespace App\Modules\Auth\Config;

use CodeIgniter\Shield\Config\Auth as ShieldAuth;

class Auth extends ShieldAuth
{
    public array $views = [
        // Authentication pages
        'login'                       => 'App\Modules\Auth\Views\auth\login',
        'register'                    => 'App\Modules\Auth\Views\auth\register',
        // Layout
        'layout'                      => 'App\Modules\Auth\Views\layouts\auth_layout',
        // 2 Factor Authentication
        'action_email_2fa'            => '\CodeIgniter\Shield\Views\email_2fa_show',
        'action_email_2fa_verify'     => '\CodeIgniter\Shield\Views\email_2fa_verify',
        'action_email_2fa_email'      => '\CodeIgniter\Shield\Views\Email\email_2fa_email',
        // Email Activation
        'action_email_activate_show'  => '\CodeIgniter\Shield\Views\email_activate_show',
        'action_email_activate_email' => '\CodeIgniter\Shield\Views\Email\email_activate_email',
        // Magic Link
        'magic-link-login'            => 'App\Modules\Auth\Views\auth\magic_link_form',
        'magic-link-message'          => '\CodeIgniter\Shield\Views\magic_link_message',
        'magic-link-email'            => '\CodeIgniter\Shield\Views\Email\magic_link_email',
    ];
}
