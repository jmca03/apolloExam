<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakdown extends Model
{
    use HasFactory;

    protected $fillable = ['values'];

    public $timestamps = false;

    public function randoms()
    {
        return $this->belongsTo(Randoms::class, 'random_id');
    }
    
}
