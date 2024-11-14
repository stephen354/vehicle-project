<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApproveBooking extends Model
{
    use SoftDeletes;

    protected $table = 'approve_bookings';

    protected $fillable = [
        'booking_id',
        'user_id',
        'note',
    ];
    
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function Users(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
