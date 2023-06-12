<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\projects\StoreDataRequest;
use App\Http\Requests\projects\UpdateDataRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        $projects = Project::paginate(8);
        return view('admin.projects.index', compact('projects','types'));
    }

    public function indexFiltering(Request $request)
    {
        $data = $request->all();
        $filter = $data['filter_form'];
        $types = Type::all();
        if ($filter) {
            $projects = Project::where('type_id', '=', $filter)->paginate(8);
            return view('admin.projects.index', compact('projects','types'));
        }else {
            return redirect()->route('admin.projects.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();


        return view('admin.projects.create', compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataRequest $request)
    {
        try {
            $data = $request->validated();

            $data['slug'] = Str::slug($data['title'], '-');
            $project = new Project();
            $project->fill($data);
            $project->save();
            if ($request->has('technologies')) {
                $project->technologies()->attach($data['technologies']);
            }

            return redirect()->route('admin.projects.index')->with('message', "'{$project->title}' è stato creato");
        } catch (Exception $err) {
            if ($err->getCode() === '23000') {
                // to do
                var_dump('To DO');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title'], '-');
        $project->update($data);
        if ($request->has('technologies')) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }
        return redirect()->route('admin.projects.show', compact('project'))->with('message', "'{$project->title}' è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        $project->technologies()->detach(); //!!
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "{$project->title} è stato eliminato");
    }
}
