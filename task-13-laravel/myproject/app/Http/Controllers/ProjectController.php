<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;



    class ProjectController extends Controller
    {
    //     public function show($id)
    //     {
    //       $projects = Projects::find($id);
    //       return response()->json(['projects'=>$projects],200);
    // }

    public function project($user_id)
{
    $projects = Projects::where('user_id', $user_id)->get();
    return response()->json(['projects' => $projects], 200);
}

}

