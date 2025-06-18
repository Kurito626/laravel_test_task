<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LinkVisit extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'link_id',
        'ip_address',
        'user_agent',
        'visited_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'visited_at' => 'datetime'
    ];

    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
}
