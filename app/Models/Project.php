<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // essendo one to many il project appartiene a una categoria quindi anche il model
    //in one to many(dalla parte del belongsTo) il nome della funzione deve essere il nome del model(al singolare), infaati type() è un nome arbitrario m mglio tenerlo cosi
    //questa funzione verra letta come una proprietà del model es $post->category
    public function type(){
        return $this->belongsTo(Type::class);

    }

    public function technlogies(){

        return $this->belongsToMany(Technology::class);
    }

    protected $fillable = [
        'title',
        'slug',
        // 'image',
        // 'text',
    ];
}
