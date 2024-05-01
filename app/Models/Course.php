<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
   
    public function courseContents()
    {
        return $this->hasMany(CourseContent::class);
    }
}



//doz dicrord ntahat l7olol
//aji ngolk ana kaybnli ndiro 3l9a bin courses w courses content n:n z3ma courses aykon fiha bzf c conteent e content y9d ytst3mal f course khra 
// wlkin chat kaygoli ndirha n:1 z3ma kola course fiha bzf d content wlkin content mo3yan ykon ghi f course wa7da