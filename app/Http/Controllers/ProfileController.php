<?php

namespace App\Http\Controllers;

use App\Http\Resources\Profile\ProfileResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function me(Request $request): ProfileResource
    {
        return ProfileResource::make($request->user());
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->token()?->revoke();

        return response()->json(status: 204);
    }
}
