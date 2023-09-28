<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    protected $primaryKey = 'vehicleID';

    protected $keyType = 'string';

    protected $fillable = [
        'vehicleID',
        'vehicle_name',
        'vehiclePlate',
        'vehicle_capacity',
        'vehicle_image',
        'user_id'
    ];

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    use HasFactory;
}
