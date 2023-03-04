<?php

namespace App\Domains\Auth\Web\Controllers;

use App\Domains\Auth\Services\CreateAccount;
use App\Domains\Auth\Web\ViewHelpers\RegisterViewHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class RegisterController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Auth/Register', [
            'data' => RegisterViewHelper::data(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $employee = (new CreateAccount())->execute([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
        ]);

        Auth::login($employee);

        return redirect()->route('welcome.index');
    }
}
