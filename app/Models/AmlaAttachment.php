<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmlaAttachment extends Model
{
    //
    protected $table = 'istr_AMLA_Attachment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'form_id',
        'form_type',
        'file_name',
        'updatedAt',
        'createdAt',
        'deletedAt',
        'remark',
    ];
}
