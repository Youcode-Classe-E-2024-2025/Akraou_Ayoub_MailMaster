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

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'  => 'required|string|max:255',
                'email' => 'required|email|unique:subscribers,email',
            ]);

            $subscriber = Subscriber::create($request->only('name', 'email'));

            return response()->json(['message' => 'Created successfully', 'data' => $subscriber], 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $subscriber = Subscriber::find($id);
        if (!$subscriber) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json($subscriber);
    }

    public function update(Request $request, $id)
    {
        try {
            $subscriber = Subscriber::find($id);
            if (!$subscriber) {
                return response()->json(['message' => 'Not found'], 404);
            }
            $request->validate([
                'name'  => 'sometimes|string|max:255',
                'email' => 'sometimes|email|unique:subscribers,email,' . $id,
            ]);

            $subscriber->update($request->only('name', 'email'));
            return response()->json(['message' => 'Updated successfully', 'data' => $subscriber]);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
