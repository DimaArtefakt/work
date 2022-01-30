<?php

use Symfony\Config\SecurityConfig;





return static function (SecurityConfig $security) {
    $security->enableAuthenticatorManager(true);

    $security->roleHierarchy('ROLE_ADMIN', ['ROLE_USER']);
    //$security->roleHierarchy('ROLE_SUPER_ADMIN', ['ROLE_ADMIN']);

    $security->firewall('main')

    ;


    $security->accessControl()
        ->path('^/admin')
        ->roles(['ROLE_ADMIN']);



    // значение 'path' может быть любым валидным регулярным выражением
    // (это будет совпадать с URL вроде /api/post/7298 и /api/comment/528491)
    $security->accessControl()
        ->path('^/api/(post|comment)/\d+$')
        ->roles(['ROLE_USER']);
};