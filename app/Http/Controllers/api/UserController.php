<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }
}
