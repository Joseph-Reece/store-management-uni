<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Client extends Model
{
    use HasFactory;

    const courses = [
        'Bsc Software Engineering',
        'Bsc Computer Science',
        'Bsc Education Sciences',
        'Bsc Business Studies',
        'Bsc Information Technology',
    ];

    const status = [
        'Banned',
        'Active',
    ];

    protected $fillable = [
        'user_id',
        'phone',
        'status',
        'course',
        'reg_no',
    ];

    /**
     * Get the user that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the gearRequests for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function gearRequests(): HasManyThrough
    {
        return $this->hasManyThrough(GearRequest::class, User::class);
    }
}
