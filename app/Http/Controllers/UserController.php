<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Services\ImageService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return User::where('id', Auth::id())->update($request->all());
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
}
