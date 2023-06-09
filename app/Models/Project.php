<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'price_buy',
        'price_sell',
        'start_date',
        'end_date',
        'status',
        'user_id',
        'company_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'id','company_id');
    }

    public function users():HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
