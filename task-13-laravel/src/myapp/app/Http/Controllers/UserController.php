<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    /**
     * Display the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function projects($userId)
    {
        try {
            $user = User::findOrFail($userId);
            $projects = $user->projects()->paginate(5);
            return view('users.projects.index', compact('user', 'projects'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
    }


    public function storeProject(Request $request, $userId)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $user = User::findOrFail($userId);

        $project = $user->projects()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('users.projects.index', ['userId' => $userId])
            ->with('success', 'Project created successfully.');
    }

    public function createProject($userId)
    {
        $user = User::findOrFail($userId);

        return view('users.projects.create', ['userId' => $userId]);
    }



    public function deleteProject($userId, $projectId)
    {
        try {
            $user = User::findOrFail($userId);

            $project = $user->projects()->findOrFail($projectId);

            $project->delete();

            return redirect()->route('users.projects.index', ['userId' => $userId])
                ->with('success', 'Project deleted successfully');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('users.projects.index', ['userId' => $userId])
                ->with('error', 'Project not found');
        }
    }


    public function editProject($userId, $projectId)
    {
        $user = User::findOrFail($userId);
        $project = Project::findOrFail($projectId);

        return view('users.projects.edit', compact('user', 'project'));
    }

    public function updateProject(Request $request, $userId, $projectId)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $project = Project::findOrFail($projectId);
        $project->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('users.projects.index', ['userId' => $userId])
            ->with('success', 'Project updated successfully');
    }
}
