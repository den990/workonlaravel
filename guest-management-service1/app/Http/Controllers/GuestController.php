<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    public function index()
    {
        return response()->json(Guest::all(), 200);
    }

    public function store(StoreGuestRequest $request)
    {
        $guest = Guest::create($request->validated());
        return response()->json($guest, 201);
    }


    public function show($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        return response()->json($guest, 200);
    }

    public function update(UpdateGuestRequest $request, $id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $guest->update($request->validated());
        return response()->json($guest, 200);
    }

    public function destroy($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $guest->delete();
        return response()->json(['message' => 'Guest deleted'], 200);
    }
}

