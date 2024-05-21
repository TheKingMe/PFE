<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\course;
use App\Models\question;

class quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'desription',
    ];
    public function questions() {
        return $this->hasMany(question::class);
    }
    public function course() {
        return $this->belongsTo(Course::class);
    }
}
