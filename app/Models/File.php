<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'company_id',
        'project_id',
        'view_name',
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class,'id','company_id');
    }
}
