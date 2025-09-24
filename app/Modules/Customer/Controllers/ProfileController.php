<?php

namespace App\Modules\Customer\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {

        return view(config('Profile')->views['dashboard'], [
            'currentPage' => 'dashboard',
            'navItems' => $this->getNav()
        ]);
    }

    public function edit()
    {
        return view(config('Profile')->views['edit'], [
            'currentPage' => 'edit',
            'navItems' => $this->getNav()
        ]);
    }

    public function password()
    {
        return view(config('Profile')->views['password'], [
            'currentPage' => 'password',
            'navItems' => $this->getNav()
        ]);
    }

    private function getNav()
    {
        $navItems = [
            'dashboard' => [
                'title' => 'Tableau de bord',
                'icon' => 'dashboard',
                'url' => '/'
            ],
            'edit' => [
                'title' => 'Modifier le profil',
                'icon' => 'edit',
                'url' => 'edit'
            ],
            'password' => [
                'title' => 'Mot de passe',
                'icon' => 'lock',
                'url' => 'password'
            ],
            'history' => [
                'title' => 'Historique',
                'icon' => 'history',
                'url' => '#history'
            ]
        ];
        return $navItems;
    }
}