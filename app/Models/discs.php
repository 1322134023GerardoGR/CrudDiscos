<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class discs extends Model
{
    use HasFactory;

    protected $table = 'discs';

    protected $fillable = ['nombre', 'album_id', 'precio', 'stock'];
    public function Albums(): BelongsTo
    {
        return $this->belongsTo(albums::class);
    }
    public function Singers(): BelongsToMany
    {
        return $this->belongsToMany(singers::class);
    }
}
