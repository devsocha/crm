<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'position',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'id','company_id');
    }
}
