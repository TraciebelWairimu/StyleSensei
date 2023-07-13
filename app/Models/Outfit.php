<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    protected $fillable = ['name','description','image'];

    public function wardrobeItems()
    {
        return $this->belongsToMany(WardrobeItem::class);
    }
}
