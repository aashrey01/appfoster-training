<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects for a specific user.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        try {
            // Find the user by ID
            $user = User::findOrFail($userId);

            // Retrieve projects associated with the user
            $projects = $user->projects;

            // Return JSON response with the projects
            return response()->json($projects);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the user is not found
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
