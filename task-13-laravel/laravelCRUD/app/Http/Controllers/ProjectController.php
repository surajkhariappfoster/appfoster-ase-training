<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectController extends Controller
{
    // userId
    public function show($id)
    {
        $projects = Projects::where('id',$id)->first();
        return view('projects.show',['projects'=>$projects]);
    }

    public function editProjects(Request $request, $userId, $projectId, $subId) {

    }
}
