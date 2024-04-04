<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectController extends Controller
{
    public function show($id)
    {
        $projects = Projects::where('id',$id)->first();
        return view('projects.show',['projects'=>$projects]);
    }
}
