<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'name',
        'city',
        'street',
        'zip_code',
        'user_id',
    ];
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class,'company_id','id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class,'company_id','id');
    }
}
