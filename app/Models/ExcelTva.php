<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelTva extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'OR',
        'FACT_NUM',
        'DESIGNATION',  
        'M_HT',   
        'TVA',   
        'M_TTC',   
        'IF',   
        'LIB_FRSS',   
        'ICE_FRS',  
        'TAUX',  
        'ID_PAIE',  
        'DATE_PAIE',
        'DATE_FAC',
    ];
}
