<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = Users::all();
        return $users;
        // return response()->json(['users'=>$users], 200);
    }

    public function getUser($user_id)

    {
       $users = Users::where('user_id',$user_id)->get();
       return response()->json(['users'=>$users],200);
    }

    public function getAll(){
        $users = Users::all();
        return $users;
    }

    
}
