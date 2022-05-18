<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    /**
     * @param RegistrationRequest $request
     * @return bool
     */
    public function create(RegistrationRequest $request)
    {
        $date = $request->all();
        $date['password'] = Hash::make($request->password);
        User::create($date);
        return '/';
    }
}
