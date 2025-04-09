<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubscriberController extends Controller
{
    public function index()
    {
        return response()->json(Subscriber::all());
    }

    
}
