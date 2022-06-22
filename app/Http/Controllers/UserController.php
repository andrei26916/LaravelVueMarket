<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\ImageService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @param ImageService $service
     * @return array|false
     */
    public function uploadAvatar(Request $request, ImageService $service)
    {
        if ($request->has('image')){
            $path = $service->upload($request->file('image'), 'users');
            $path = '/storage/' . $path;
            $user = Auth::user();
            $user->avatar_url = $path;
            $user->save();
            return ['url' => $path];
        }
        return false;
    }


    /**
     * @param UserUpdateRequest $request
     * @return mixed
     */
    public function update(UserUpdateRequest $request)
    {
        $data = $request->all();

        $user = User::find($data['id']);
        $user->last_name = $data['last_name'];
        $user->first_name = $data['first_name'];
        $user->father_name = $data['father_name'];
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        if (!empty($data['password'])){
            $user->password = Hash::make($data['password']);
        }

        if (!empty($data['role_id'])){
            $user->roles()->sync([$data['role_id']]);
        }

        $user->save();

        return response('ok');

    }

    /**
     * @param Request $request
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request)
    {
        return User::all();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(Request $request)
    {
        User::where('id', $request->id)->delete();
        return response()->json('ok');
    }

    /**
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(UserCreateRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        if (User::create($data)) {
            return response()->json('ok');
        }
        return response()->json('false');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function show(Request $request)
    {
        $user = User::with('roles')->find($request->id);
        $user['role_id'] = null;
        if ($role = $user->roles->first()){
            $user['role_id'] = $role->id;
        }

        return $user;
    }

}
