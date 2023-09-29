<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Requests extends Model
{
    use HasFactory;

    protected $table = 'request';

    protected $primaryKey = 'requestID';

    protected $keyType = 'string';

    protected $fillable = [
        'requestID',
        'user_id',
        'route_id',
        'request_status',
        'request_date',
    ];

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(Routes::class, 'route_id', 'routeID');
    }

}
