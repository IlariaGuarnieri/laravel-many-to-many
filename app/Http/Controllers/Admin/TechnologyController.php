<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Functions\Helper as Help;
use App\Http\Requests\TechnologyRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnologyRequest $request)
    {
        $form_data = $request->all();
        $exists = Technology::where('title', $request->title)->first();
        if ($exists) {
            return redirect()->route('admin.technologies.create')->with('error', 'Tecnologia gia esistente');
        } else {
            $new_technology = new Technology();
            $form_data['slug'] = Help::generateSlug($form_data['title'], Technology::class);

            $new_technology->fill($form_data);
            $new_technology->save();

            return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia aggiunta con successo!');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Progetto eliminato correttamente');
    }
}
