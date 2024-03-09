<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssuedGear extends Model
{
    use HasFactory;

    protected $fillable =[
        'gear_request_id',
        'status',
        'due_date'
    ];

    const status = [
        'DUE',
        'RETURNED No Damage',
        'RETURNED WITH DAMAGE',
        'LOST',
    ];

    /**
     * Get the gearRequest that owns the IssuedGear
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gearRequest(): BelongsTo
    {
        return $this->belongsTo(GearRequest::class);
    }
}
