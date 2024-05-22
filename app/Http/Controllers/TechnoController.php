<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Models\types;
use Illuminate\Http\Request;
use App\Functions\Helper;

class TechnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techno = Technology::all();
        $type = types::all();
        return view('admin.technologies.index', compact('techno', 'type'));
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
                'technologies' => 'required|min:2|max:20',
            ],
            [
                'technologies.required' => 'Il nome è obbligatorio.',
                'technologies.min' => 'Il nome deve contenere almeno :min caratteri.',
                'technologies.max' => 'Il nome non può superare i :max caratteri.',
            ]
        );

        $new_techno = new Technology();
        $new_techno->technologies = $valData['technologies'];
        $new_techno->slug = Helper::makeSlug($valData['technologies'], new Technology());
        $new_techno->save();

        return redirect()->route('admin.technologies.index', $new_techno);
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
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $techno)
    {
        $valData = $request->validate(
            [
                'technologies' => 'required|min:2|max:20',
            ],
            [
                'technologies.required' => 'Il nome è obbligatorio.',
                'technologies.min' => 'Il nome deve contenere almeno :min caratteri.',
                'technologies.max' => 'Il nome non può superare i :max caratteri.',
            ]
        );
        if ($valData['technologies'] === $techno->technologies) {
            $valData['slug'] = $techno->slug;
        } else {
            $valData['slug'] = Helper::makeSlug($valData['technologies'], new Technology());
        }
        $techno->update($valData);
        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
