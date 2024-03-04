<?php

declare(strict_types=1);

namespace App\GraphQL\Validators;

use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;
use Illuminate\Validation\Rules;

final class UserRegisterInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'role_id' => ['required'],
            'password' => ['required']
        ];
    }

    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function messages(): array
    {
        return [
            'name.max' => 'User name have a limit of 280 character',
            'email.max' => 'User email have a limit of 280 character',
            'role_id.required' => 'Please select the role',
        ];
    }
}
