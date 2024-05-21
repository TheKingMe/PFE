<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\question;
class option extends Model
{
    use HasFactory;
    protected $table = 'options'; // Ensure the correct table name is specified
        protected $fillable = ['question_id', 'option_text', 'value'];
    public function question() {
        return $this->belongsTo(question::class);
    }
}
