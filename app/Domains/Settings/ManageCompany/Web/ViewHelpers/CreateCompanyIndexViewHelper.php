<?php

namespace App\Domains\Settings\ManageCompany\Web\ViewHelpers;

use App\Http\Controllers\Controller;

class CreateCompanyIndexViewHelper extends Controller
{
    public static function data(): array
    {
        return [
            'url' => [
                'back' => route('welcome.index'),
                'store' => route('create_company.store'),
            ],
        ];
    }
}
