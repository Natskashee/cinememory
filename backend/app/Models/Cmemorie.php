<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmemorie extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'type', 'statut', 'episode', 'image'
    ];
}
