<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Projects;

class UserController extends Controller
{
    public function index()
    {
        return view ('users.index',['users'=>Users::get()]);
    }

    public function create()
    {
        return view ('users.create');
    }

    public function store(Request $request)
{
    
    $users = new Users;
    $users->id = $request->id;
    $users->name = $request->name;
    $users->email = $request->email;
    $users->gender = $request->gender;
    $users->status = $request->status;
    $users->save();

    // If the save operation was successful, redirect back with success message
    return back()->withSuccess('User added successfully!');
}

    public function edit($id){
        //$users = Users::where('id',$id)->first();
        //return view ('users.edit',['users'=>$users]);
        
        $users = Users::find($id); // Assuming you're using Eloquent ORM
    return view('users.edit', ['users' => $users]);

    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'id'=>'required',
        //     'name'=>'required',
        //     'email'=>'required',
        //     'gender'=>'required',
        //     'status'=>'required'
        // ]);
        
        //$users = Users::where('id',$id)->first();
        $users = Users::findOrFail($id);
        $users->id=$request->id;
        $users->name=$request->name;
        $users->email=$request->email;
        $users->gender=$request->gender;
        $users->status=$request->status;

        $users->save();
        return back()->withSuccess('User updated !!!!!');
    }


    // public function destroy($id)
    // {
    //     $users = Users::where('id',$id)->first();
    //     $users->delete();
    
       
    // }

    public function destroy($id)
{
    $user = Users::find($id);
    $project = Projects::where('user_id', $id)->first();

    if ($user && $project) {
        $user->delete();
        $project->delete();
        return response()->json(['message' => 'User and associated project deleted successfully'], 200);
    } elseif ($user) {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    } elseif ($project) {
        $project->delete();
        return response()->json(['message' => 'Associated project deleted successfully'], 200);
    } else {
        return response()->json(['message' => 'User or associated project not found'], 404);
    }
}

    public function show($id)
    {
        $users = Users::where('id',$id)->first();
        return view('users.show',['users'=>$users]);
    }

    public function showProjects($id)
    {
        $user = Users::findOrFail($id);
        $projects = $user->projects;
        
        return view('projects.show', compact('user', 'projects'));
    }
     
    public function shows($id)
    {
        $users = Users::find($id);

        if (!$users) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($users);
    }

}
