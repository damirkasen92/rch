<?php

namespace App\Actions\Fortify;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $email = $input['email'];

        $user = User::create([
            'name' => $input['name'],
            'email' => $email,
            'password' => Hash::make($input['password']),
        ]);

        $user->roles()->attach(2);

        if ($user) {
            Mail::to($email)->send(new WelcomeMail([
                'email' => $email,
                'name' => $input['name'],
                'password' => $input['password'],
            ]));

            return $user;
        }
    }
}
