<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $table = 'vehicles';

    protected $fillable = [
        'name',
        'type',
        'manager_id',
        'supervisor_id',
        'status'
    ];
    
    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function Booking(): HasMany
    {
        return $this->hasMany(Booking::class,'vehicle_id','id');
    }
}
