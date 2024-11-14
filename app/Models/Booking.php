<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $table = 'bookings';

    protected $fillable = [
        'vehicle_id',
        'user_id',
        'purpose',
        'booker_name',
        'date',
        'date_end',
        'vehicle_condition'
    ];
    
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function Approve(): HasMany
    {
        return $this->hasMany(ApproveBooking::class,'booking_id','id');
    }
    public function Vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class,'vehicle_id','id');
    }
}
