<?php

return [

    // ---------------------------------------------------------
    // Authentication - Login
    // ---------------------------------------------------------
    'login'                 => 'Connexion',
    'loginHeader'           => 'Bon retour parmi nous',
    'loginSubtitle'         => 'Entrez vos identifiants pour accéder à votre compte',
    'signIn'                => 'Se connecter',

    // ---------------------------------------------------------
    // Authentication - Register
    // ---------------------------------------------------------
    'register'              => 'Inscription',
    'registerHeader'        => 'Créez votre compte',
    'registerSubtitle'      => 'Rejoignez-nous et commencez votre voyage dès aujourd\'hui',
    'createAccount'         => 'Créer votre compte',
    'signUp'                => 'S\'inscrire',

    // ---------------------------------------------------------
    // Authentication - Common
    // ---------------------------------------------------------
    'rememberMe'            => 'Se souvenir de moi',
    'forgotPassword'        => 'Mot de passe oublié ?',
    'logout'                => 'Se déconnecter',
    'notRegistered'         => 'Pas encore membre ?',
    'alreadyHaveAccount'    => 'Vous avez déjà un compte ?',
    'backToSite'            => 'Retour au site',

    // ---------------------------------------------------------
    // Form Fields Labels
    // ---------------------------------------------------------
    'emailLabel'             => 'Adresse email',
    'usernameLabel'          => 'Nom d\'utilisateur',
    'passwordLabel'          => 'Mot de passe',
    'passwordConfirmLabel'   => 'Confirmez votre mot de passe',

    // ---------------------------------------------------------
    // Form Fields Placeholders
    // ---------------------------------------------------------
    'emailPlaceholder'       => 'votre@email.com',
    'usernamePlaceholder'    => 'Votre nom d\'utilisateur',
    'passwordPlaceholder'    => 'Votre mot de passe',
    'passwordConfirmPlaceholder' => 'Confirmez votre mot de passe',

    // ---------------------------------------------------------
    // Form Fields Hints & Help Text
    // ---------------------------------------------------------
    'emailHint'              => 'Votre email vous permettra de vous connecter',
    'usernameHint'           => 'Le nom d\'utilisateur doit être unique et ne peut comporter que des lettres, des chiffres et des points',
    'passwordHint'           => 'Votre mot de passe doit respecter les critères de sécurité',

    // ---------------------------------------------------------
    // Password Validation & Rules
    // ---------------------------------------------------------
    'passwordRules'          => 'Votre mot de passe doit respecter les règles suivantes : ',
    'passwordMinLength'      => '• Minimum {0} caractères',
    'passwordLowercase'      => '• Au moins une minuscule',
    'passwordUppercase'      => '• Au moins une majuscule',
    'passwordNumber'         => '• Au moins un chiffre',
    'passwordSpecial'        => '• Au moins un caractère spécial ({0})',

    'passwordsDoNotMatch'    => 'Les mots de passe ne correspondent pas',
    'errorPasswordLength'    => 'Le mot de passe doit contenir au moins {0} caractères.',
    'suggestPasswordLength'  => 'Essayez d\'utiliser un mot de passe plus long pour plus de sécurité.',
    'errorPasswordPersonal'  => 'Le mot de passe ne doit pas contenir votre email ou nom d\'utilisateur.',
    'suggestPasswordPersonal' => 'Choisissez un mot de passe indépendant de vos informations personnelles.',
    'errorPasswordCommon'    => 'Ce mot de passe est trop courant et facile à deviner.',
    'suggestPasswordCommon'  => 'Utilisez un mot de passe plus unique et complexe.',
    'errorPasswordLowercase' => 'Le mot de passe doit contenir au moins une lettre minuscule.',
    'errorPasswordUppercase' => 'Le mot de passe doit contenir au moins une lettre majuscule.',
    'errorPasswordNumber'    => 'Le mot de passe doit contenir au moins un chiffre.',
    'errorPasswordSpecial'   => 'Le mot de passe doit contenir au moins un caractère spécial parmi : !@#$%^&*.',
    'invalidOldPassword'     => 'L\'ancien mot de passe que vous avez saisi est incorrect.',

    // ---------------------------------------------------------
    // Magic Link Pages and Emails
    // ---------------------------------------------------------
    'useMagicLink'       => 'Utiliser un lien magique',
    'magicLinkSubtitle'  => 'Nous vous enverrons un lien sécurisé pour vous connecter sans mot de passe',
    'showMagicLinkInfo'  => 'Comment ça marche ?',
    'hideMagicLinkInfo'  => 'Masquer les informations',
    'magicLinkInfoTitle' => 'Comment ça marche ?',
    'magicLinkInfoText'  => 'Nous vous enverrons un e-mail avec un lien de connexion à usage unique qui ne nécessite pas de mot de passe. Ce lien expirera après {0}.',
    'send'               => 'Envoyer',
    'backToLogin'        => 'Retour à la connexion',
    'rememberPassword'   => 'Vous vous souvenez de votre mot de passe ?',
    'checkYourEmail'     => 'Vérifiez votre boite mail',
    'magicLinkDetails'   => 'Nous venons de vous envoyer un email contenant un lien magique. Cliquez sur le lien pour vous connecter. Le lien n\'est valide que {0, number} minutes.',
    'magicLinkMessage'   => 'Utilisez le lien magique ci-dessous pour vous connecter. Ce lien est valable {0} minutes. ',

    // ---------------------------------------------------------
    // Mail Activation Pages and Emails
    // ---------------------------------------------------------
    'emailActivateTitle'    => 'Activez votre compte',
    'emailActivateBody'     => 'Vous devez activer votre compte avant de pouvoir vous connecter. Veuillez entrer le code que nous vous avons envoyé par email.',
    'token'                 => 'Code d\'activation',
    'emailActivateSuccess'  => 'Votre compte a été activé avec succès. Vous pouvez maintenant vous connecter.',

    // ---------------------------------------------------------
    // Email Change
    // ---------------------------------------------------------
    'emailSubjectChange'    => 'Votre adresse e-mail a été modifiée',
    'emailChangeNotice'     => 'Cet e-mail confirme que votre adresse e-mail de connexion a été modifiée en <b>{newEmail}</b>. Si vous n\'êtes pas à l\'origine de ce changement, veuillez contacter immédiatement notre support.',
    'emailUpdateSuccess'    => 'Votre adresse e-mail a été modifiée. Pour réactiver votre compte, veuillez cliquer sur le lien d\'activation que nous avons envoyé à votre nouvelle adresse e-mail.',

    // ---------------------------------------------------------
    // Emails user info
    // ---------------------------------------------------------
    'emailInfo'         => 'Informations sur l\'utilisateur',
    'emailIpAddress'    => 'Adresse IP ',
    'emailDevice'       => 'Dispositif ',
    'emailDate'         => 'Date et heure ',

    // ---------------------------------------------------------
    // UI Interactions
    // ---------------------------------------------------------
    'togglePasswordVisibility' => 'Basculer la visibilité du mot de passe',
    'passwordCriteriaLength'    => 'Au moins 8 caractères',
    'passwordCriteriaUppercase' => 'Une lettre majuscule',
    'passwordCriteriaLowercase' => 'Une lettre minuscule',
    'passwordCriteriaNumber'    => 'Un chiffre',
    'passwordCriteriaSpecial'   => 'Un caractère spécial',

];
