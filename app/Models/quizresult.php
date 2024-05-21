<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quizresult extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','course_id','result'];
    public function user(){
        $this->belongsto(User::class);
    }
    public function course(){
        $this->belongsTo(Course::class);
    }
}
