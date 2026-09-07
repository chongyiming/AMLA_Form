<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmlaForm3 extends Model
{
    //
    protected $table = 'istr_AMLAForm3';
    protected $primaryKey = 'form_id';
    public $timestamps = false;
    protected $fillable = [
        'form_id',
        'individual_name',
        'cust_pep',
        'source_fund',
        'add_info',
        'approval',
        'approval_signature',
        'justification',
        'senior_management',
        'position',
        'date',
    ];
}
