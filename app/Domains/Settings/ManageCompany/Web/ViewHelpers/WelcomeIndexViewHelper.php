<?php

namespace App\Domains\Settings\ManageCompany\Web\ViewHelpers;

use App\Http\Controllers\Controller;

class WelcomeIndexViewHelper extends Controller
{
    public static function data(): array
    {
        return [
            'url' => [
                'create' => route('create_company.index'),
                'logout' => route('logout'),
            ],
        ];
    }
}
