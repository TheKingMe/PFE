<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\quiz;
use App\Models\Option;
class question extends Model
{
    use HasFactory;

    protected $table = 'questions'; // Ensure the correct table name is specified
    protected $fillable = ['quiz_id', 'question_text'];
    public function quiz() {
        return $this->belongsTo(quiz::class);
    }
    public function options() {
        return $this->hasMany(Option::class);
    }
}
