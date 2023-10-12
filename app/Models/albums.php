<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class albums extends Model
{
    use HasFactory;
    protected $table = 'albums';

    protected $fillable = ['nombre', 'anio_lanzamiento'];
    public function Discs(): HasMany
    {
        return $this->hasMany(discs::class);
    }
}
