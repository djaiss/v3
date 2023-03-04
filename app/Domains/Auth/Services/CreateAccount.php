<?php

namespace App\Domains\Auth\Services;

use App\Models\Employee;
use App\Services\BaseService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class CreateAccount extends BaseService
{
    /**
     * Get the validation rules that apply to the service.
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:employees,email|email|max:255',
            'password' => ['required', 'confirmed', Password::min(6)],
            'password_confirmation' => 'required',
        ];
    }

    /**
     * Create an account for the employee.
     */
    public function execute(array $data): Employee
    {
        $this->validateRules($data);

        $employee = Employee::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        event(new Registered($employee));

        return $employee;
    }
}
