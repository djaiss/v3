<?php

namespace App\Domains\Settings\ManageCompany\Web\Controllers;

use App\Domains\Settings\ManageCompany\Web\ViewHelpers\WelcomeIndexViewHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class WelcomeController extends Controller
{
    public function index(): Response|RedirectResponse
    {
        if (Auth::user()->company_id) {
            return redirect()->route('home.index');
        }

        return Inertia::render('Welcome/Index', [
            'data' => WelcomeIndexViewHelper::data(),
        ]);
    }
}
