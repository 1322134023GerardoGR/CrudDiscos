<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class singers extends Model
{
    use HasFactory;
    protected $table = 'singers';

    protected $fillable = ['nombre', 'apellidos', 'fecha_lanzamiento'];
    public function Artists(): BelongsToMany
    {
        return $this->belongsToMany(artists::class);
    }
}
