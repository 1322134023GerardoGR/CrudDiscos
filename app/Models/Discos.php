<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discos extends Model
{
    use HasFactory;

    protected $table = 'discos';

    protected $fillable = ['nombre', 'album', 'precio', 'stock'];

}
