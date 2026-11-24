<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'service',
        'name',
        'contact',
        'trip_date',
        'group_size',
        'pickup',
        'destination',
        'notes',
        'source',
    ];

    protected $casts = [
        'trip_date' => 'date',
    ];

    /**
     * Human-readable service label from config, falling back to the raw key.
     */
    public function serviceLabel(): string
    {
        return config("business.services.{$this->service}", $this->service);
    }
}
