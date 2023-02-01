<?php

namespace ProtoneMedia\Splade\Http;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ProtoneMedia\Splade\PasswordValidator;

class ConfirmPasswordController
{
    /**
     * Confirm the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ProtoneMedia\Splade\PasswordValidator  $passwordValidator
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, PasswordValidator $passwordValidator): Response
    {
        $passwordValidator->validateRequest($request, 'password');

        $request->session()->put('auth.password_confirmed_at', time());

        return response()->noContent(200)->skipSpladeMiddleware();
    }
}
