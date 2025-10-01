<?php

namespace App\Modules\Customer\Controllers;

use App\Controllers\BaseController;
use App\Modules\Customer\Models\CustomerProfileModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Modules\Customer\Entities\CustomerProfile;

class ProfileController extends BaseController
{
    protected $profileModel;
    protected $userModel;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger,
    ) {
        parent::initController($request, $response, $logger);
        $this->profileModel = new CustomerProfileModel();
        $this->userModel = auth()->getProvider();
    }

    public function dashboard()
    {
        $user = auth()->user();
        if (!$user || !$user->inGroup('customer')) {
            redirect()->to('/');
        }

        $profile = $this->profileModel->findByUserId($user->id);

        if (!$profile) {
            return redirect()->to('/profile/edit');
        }

        $data = [
            'title'   => 'Mon profil',
            'user'    => $user,
            'profile' => $profile,
            'currentPage' => 'profile_dashboard',
            'navItems'    => $this->getNav(),
        ];

        return view(config('Customer')->views['dashboard'], $data);
    }

    public function edit()
    {
        $user = auth()->user();
        if (!$user || !$user->inGroup('customer')) {
            return redirect()->to('/');
        }

        $profile = $this->profileModel->findByUserId($user->id);
        $isNew = $profile === null;
        $profile = $profile ?? new CustomerProfile(['user_id' => $user->id]);

        $data = [
            'title'       => $isNew ? 'Créer mon profil' : 'Éditer mon profil',
            'user'        => $user,
            'profile'     => $profile,
            'isNew'       => $isNew,
            'currentPage' => 'profile_edit',
            'navItems'    => $this->getNav(),
        ];

        return view(config('Customer')->views['edit'], $data);
    }

    public function update()
    {
        $user = auth()->user();
        if (!$user || !$user->inGroup('customer')) {
            return redirect()->to('/');
        }

        // Retrieve the validation rules from Auth config
        $usernameRules = config('Auth')->usernameValidationRules;
        $emailRules    = config('Auth')->emailValidationRules;

        // Ignore the current user for the is_unique rule
        $usernameRules['rules'][] = "is_unique[users.username,id,{$user->id}]";
        $emailRules['rules'][]    = "is_unique[auth_identities.secret,user_id,{$user->id}]";

        $validationRules = [
            'username'    => $usernameRules,
            'email'       => $emailRules,
            'first_name'  => 'required|string|min_length[2]|max_length[50]',
            'last_name'   => 'required|string|min_length[2]|max_length[50]',
            'phone'       => 'required|string|min_length[8]|max_length[20]',
            'address'     => 'permit_empty|string|max_length[255]',
            'postal_code' => 'permit_empty|string|max_length[20]',
            'city'        => 'permit_empty|string|max_length[100]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();

        // Charger le profil actuel
        $profile = $this->profileModel->findByUserId($user->id);
        if (!$profile) {
            $profile = new \App\Modules\Customer\Entities\CustomerProfile();
            $profile->user_id = $user->id;
        }

        // Vérifier si quelque chose a changé
        $hasChanges = false;

        // Comparer les champs "users"
        if ($user->username !== $data['username']) {
            $hasChanges = true;
            $user->username = $data['username'];
        }
        if ($user->email !== $data['email']) {
            $hasChanges = true;
            $user->email = $data['email'];
        }

        // Comparer les champs "profile"
        $profileFields = ['first_name', 'last_name', 'phone', 'address', 'postal_code', 'city'];
        foreach ($profileFields as $field) {
            if ($profile->$field !== $data[$field]) {
                $hasChanges = true;
                $profile->$field = $data[$field];
            }
        }

        // Vérifier si le profil est complet
        $isProfileComplete = $this->isProfileComplete($data);
        if ($profile->is_complete !== $isProfileComplete) {
            $hasChanges = true;
            $profile->is_complete = $isProfileComplete;
        }

        // Si aucune modification → redirection sans sauvegarde
        if (!$hasChanges) {
            return redirect()->to('profile/')->with('info', 'Aucune modification détectée.');
        }

        // Sauvegarder uniquement si des changements existent
        $this->userModel->save($user);
        $this->profileModel->save($profile);

        // Message de succès adapté
        $message = 'Profil mis à jour avec succès.';
        if ($isProfileComplete && !$profile->is_complete) {
            $message = 'Profil complété avec succès !';
        }

        return redirect()->to('profile/')->with('success', $message);
    }

    private function isProfileComplete(array $data): bool
    {
        $requiredFields = [
            'first_name',
            'last_name',
            'phone'
        ];

        $optionalFields = [
            'address',
            'postal_code',
            'city'
        ];

        // Vérifier les champs requis
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }

        // Vérifier que si l'adresse est remplie, le code postal et la ville le sont aussi
        if (!empty($data['address'])) {
            if (empty($data['postal_code']) || empty($data['city'])) {
                return false;
            }
        }

        return true;
    }


    public function password()
    {
        $user = auth()->user();
        $data = [
            'user'  => $user,
            'title' => 'Modifier votre mot de passe',
            'currentPage' => 'profile_password',
            'navItems'    => $this->getNav(),
        ];
        return view(config('Customer')->views['password'], $data);
    }

    public function updatePassword()
    {
        return redirect()->to('/profile/password')->with('error', 'Cette fonctionnalité n\'est pas encore implémentée.');
    }

    public function history()
    {
        $data = [
            'title'       => 'Historique des commandes',
            'currentPage' => 'profile_history',
            'navItems'    => $this->getNav(),
        ];
        return view(config('Customer')->views['history'], $data);
    }

    private function getNav()
    {
        $navItems = [
            'profile_dashboard' => [
                'title' => lang('Profile.navDashboard'),
                'icon'  => 'dashboard',
                'url'   => '/'
            ],
            'profile_edit' => [
                'title' => lang('Profile.navEditProfile'),
                'icon'  => 'edit',
                'url'   => 'edit'
            ],
            'profile_password' => [
                'title' => lang('Profile.navPassword'),
                'icon'  => 'lock',
                'url'   => 'password'
            ],
            'profile_history' => [
                'title' => lang('Profile.navHistory'),
                'icon'  => 'history',
                'url'   => 'history'
            ]
        ];

        return $navItems;
    }
}
