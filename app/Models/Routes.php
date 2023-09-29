<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Routes extends Model
{
    use HasFactory;

    protected $table = 'routes';

    protected $primaryKey = 'routesID';

    protected $keyType = 'string';

    protected $fillable = [
        'routeID',
        'vehicle_id',
        'route_from',
        'route_to',
        'route_time',
        'route_price',
    ];

    public $timestamps = false;

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'vehicleID');
    }
}
