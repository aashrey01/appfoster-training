<?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\ModelNotFoundException;

// class ProjectController extends Controller
// {
   
//     public function index($userId)
//     {
//         try {
//             $user = User::findOrFail($userId);

//             $projects = $user->projects;

//             return response()->json($projects);
//         } catch (ModelNotFoundException $e) {
//             return response()->json(['error' => 'User not found'], 404);
//         }
//     }
// }
