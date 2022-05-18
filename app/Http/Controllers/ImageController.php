<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request, ImageService $service)
    {
        return $service->upload($request->file('image'));
    }
}
