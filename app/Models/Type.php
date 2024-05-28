<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    // essendo one to many project puo avere solo un type e type ha molti projects
    //in one to many(dalla parte del hasMany) il nome della funzione deve essere il nome del model(al plurale), infaati type() è un nome arbitrario m mglio tenerlo cosi
    //questa funzione verra letta come una proprietà del model es $category->posts

    public function projects(){
        return $this->hasMany(Project::class);
    }

    protected $fillable = ['title', 'slug',];
}
