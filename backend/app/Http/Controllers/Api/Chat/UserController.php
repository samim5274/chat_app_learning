<?php

namespace App\Http\Controllers\Api\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $meId = $request->user()->id;

        $users = User::where('id', '!=', $meId)
            ->select('id','name','email')
            ->orderBy('name')
            ->get();

        return response()->json(['success'=>true,'data'=>$users]);
    }
}
