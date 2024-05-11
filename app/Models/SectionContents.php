<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionContents extends Model
{
    use HasFactory;
    protected $fillable = ['file_name', 'file_path', 'file_type', 'section_id'];

}
