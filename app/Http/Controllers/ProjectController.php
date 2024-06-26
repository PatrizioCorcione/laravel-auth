<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Functions\Helper;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();
        return view('admin.projects.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valData = $request->validate(
            [
                'title' => 'required|min:2|max:20',
                'description' => 'required|min:2|max:200'
            ],
            [
                'title.required' => 'Il titolo è obbligatorio.',
                'title.min' => 'Il titolo deve contenere almeno :min caratteri.',
                'title.max' => 'Il titolo non può superare i :max caratteri.',
                'description.required' => 'La descrizione è obbligatoria.',
                'description.min' => 'La descrizione deve contenere almeno :min caratteri.',
                'description.max' => 'La descrizione non può superare i :max caratteri.',
            ]
        );

        $new_project = new Project();
        $new_project->title = $valData['title'];
        $new_project->description = $valData['description'];
        $new_project->slug = Helper::makeSlug($new_project['title'], new Project());
        $new_project->save();

        return redirect()->route('admin.project.index', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $valData = $request->validate(
            [
                'title' => 'required|min:2|max:20',
                'description' => 'required|min:2|max:200'
            ],
            [
                'title.required' => 'Il titolo è obbligatorio.',
                'title.min' => 'Il titolo deve contenere almeno :min caratteri.',
                'title.max' => 'Il titolo non può superare i :max caratteri.',
                'description.required' => 'La descrizione è obbligatoria.',
                'description.min' => 'La descrizione deve contenere almeno :min caratteri.',
                'description.max' => 'La descrizione non può superare i :max caratteri.',
            ]
        );
        if ($valData['title'] === $project->title) {
            $valData['slug'] = $project->slug;
        } else {
            $valData['slug'] = Helper::makeSlug($valData['title'], new Project());
        }
        $project->update($valData);
        return redirect()->route('admin.project.index')->with('success', 'Progetto aggiornato con successo.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.project.index')->with('deleted', 'Il progetto ' . $project->title . ' e stato eliminato');
    }
}
