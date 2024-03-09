<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GearRequest extends Model
{
    use HasFactory;

    protected $fillable =[
        'status',
        'issue_date'
    ];

    const status =[
        'PENDING',
        'APPROVED',
        'DENIED',
        'ISSUED'
    ];

    /**
     * Get the user that owns the GearRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the gear that owns the GearRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gear(): BelongsTo
    {
        return $this->belongsTo(Gear::class);
    }

    /**
     * Get the issued_gear associated with the GearRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function issued_gear(): HasOne
    {
        return $this->hasOne(IssuedGear::class);
    }

    
}
