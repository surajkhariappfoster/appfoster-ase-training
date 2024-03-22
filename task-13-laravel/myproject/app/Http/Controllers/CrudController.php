<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function create(Request $request)
    {
        $users = new Users();
        $users->user_id = $request->input('user_id');
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->gender = $request->input('gender');
        $users->status = $request->input('status');

        $users->save();
        return response()->json($users);
    }
}
