<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmlaForm extends Model
{
    protected $table = 'istr_amla_forms';
    protected $primaryKey = 'form_id';
    public $timestamps = false;

    protected $fillable = [
        'form_type',
        'doc_no',
        'branch_name',
        'trx_no',
        'created_by',
        'status',
        'created_date',
        'updated_date',
        'uuid',
        'sales_date',
        'reviewed_by',
        'reviewed_date',
        'related_form_id',
        'reviewed_comment',
    ];
}
