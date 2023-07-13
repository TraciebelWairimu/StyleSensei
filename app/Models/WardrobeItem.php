<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardrobeItem extends Model
{
    use HasFactory;
    protected $table = 'tbl_wardrobe';

    protected $fillable = ['item','category', 'description', 'date_added', 'image'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
