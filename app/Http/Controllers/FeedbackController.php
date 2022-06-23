<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackCreateRequest;
use App\ProductFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{

    public function store(FeedbackCreateRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();

        $feedback = ProductFeedback::create($data);
        $feedback->load('user');

        return $feedback;
    }
}
