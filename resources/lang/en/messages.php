<?php
return [
    'verify' => [
        'code' => [
            'success'     => 'your email is verified',
            'filed'       => 'your email verified filed',
            'code_expire' => 'your code is expired.',
        ],
    ],
    'login'  => [
        'Success'          => 'User login has been successfully ',
        'error'            => 'Invalid Credentials',
        'account_verified' => 'your account is not verified',
        'auth_fail'        => 'authentication failed',

    ],
    'logout' => [
        'success' => 'user has been logout successfully',
    ],

    'register'              => [
        'success' => 'User has been created. please go to your mail box and confirm your email address.',
        'error'   => '',
    ],
    'change_password'       => [

        'success'              => 'your password change successfully',
        'fail'                 => 'change password has been failed.',
        'confirm_old_password' => 'please confirm your old password.',
        'new_password'         => 'please enter new password which is not similar then current password.',
        'update_password'      => 'Password updated successfully.',
    ],
    'forgot_password_email' => [
        'success'     => 'email has been sent.',
        'expire_link' => 'your link is expired.',
        'check_link'  => 'something is wrong',
    ],
    'request'               => [
        'success' => 'request has been created successfully.',
        'error'   => 'internal server error.',
    ],
];
