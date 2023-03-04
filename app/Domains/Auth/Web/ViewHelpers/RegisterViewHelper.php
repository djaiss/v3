<?php

namespace App\Domains\Auth\Web\ViewHelpers;

use App\Http\Controllers\Controller;

class RegisterViewHelper extends Controller
{
    public static function data(): array
    {
        return [
            'url' => [
                'login' => route('login.create'),
                'store' => route('register.store'),
            ],
        ];
    }
}
