<?php

namespace App\Domains\Auth\Web\ViewHelpers;

use App\Http\Controllers\Controller;

class LoginViewHelper extends Controller
{
    public static function data(): array
    {
        return [
            'url' => [
                'register' => route('register'),
                'store' => route('login.store'),
            ],
        ];
    }
}
