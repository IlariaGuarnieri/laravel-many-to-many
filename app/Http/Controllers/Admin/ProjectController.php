<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Functions\Helper as Help;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $technologies = Technology::all();
        return view('admin.projects.index', compact('projects', 'technologies'));
        // dd($projects);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // VERIFICO SE ESITE GIA UN PROGETTO CON LO STESSO TITOLO
    public function store(ProjectRequest $request)  //php artisan make:request ProjectRequest
    {
        // qui atterro da index.blade.php riga 7
        // prima di inserire nuovo proj verifico che non ci sia gia
        // se esiste ritorno a inde con mess di errore
        // se non esiste salvo ritorno a index con messaggio di successo
        $form_data = $request->all();
        $exists = Project::where('title', $form_data['title'])->first();
        if ($exists) {
            return redirect()->route('admin.projects.index')->with('error', 'Progetto gia esistente');
        } else {
            $new = new Project();
            // $new->title = $request->title;

            $form_data['slug'] = Help::generateSlug($form_data['title'], Project::class);

            $new->fill($form_data);
            $new->save();


            //l'associazione many to many deve avvenire dopo il salvataggio del dato nel db
            //se trovo la chiave tecnologies inserisco la relazione nella tabella pivot
            if (array_key_exists('technologies', $form_data)) {
                $new->technologies()->attach($form_data['technologies']);
            }
            return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiunto con successo!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project = Project::find($project->id);
        if ($project) {
            return view('admin.projects.show', compact('project'));
        } else {
            return redirect()->route('admin.projects.index')->with('error', 'Project non trovato');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.projects.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $val_data = $request->validate(
            [
                'title' => 'required|min:2|max:20'
            ],
            [
                'title.required' => 'devi inserire il nome',
                'title.min' => 'devi inserire :min caratteri',
                'title.max' => 'devi inserire :max caratteri'
            ]
        );

        $exists = Project::where('title', $request->title)->first();
        if ($exists) {
            return redirect()->route('admin.Project.index')->with('error', 'Progetto gia esistente');
        } else {
            $val_data['slug'] = Help::generateSlug($request->title, Project::class);
            $project->update($val_data);

            return redirect()->route('admin.Project.index')->with('success', 'Progetto aggiunto');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato correttamente');
    }
}
