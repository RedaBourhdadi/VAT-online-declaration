<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelTva extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'col1',
        'col2',
        'col3',       
    ];
}
