<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'category',
        'quanity',
        'price',
        'description',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
