<?php

namespace App\Domains\Auth\Web\ViewHelpers;

use App\Http\Controllers\Controller;

class EmailVerificationViewHelper extends Controller
{
    public static function data(): array
    {
        return [
            'url' => [
                'store' => route('verification.send'),
            ],
        ];
    }
}
