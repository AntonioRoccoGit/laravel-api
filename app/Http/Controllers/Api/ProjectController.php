<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {

        $filter = $request->all();


        if ($request->has('type_id')) {
            $projects = Project::with('type', 'technologies')->where('type_id', $filter['type_id'])->paginate(8);
        } else {
            $projects = Project::with('type', 'technologies')->paginate(8);
        };


        return response()->json([
            'response' => 'success',
            'results' => $projects
        ]);
    }


    public function show($slug)
    {
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}
