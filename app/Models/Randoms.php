<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Randoms extends Model
{
    use HasFactory;

    protected $fillable = [
        'values', 'flag'
    ];

    public $timestamps = false;

    public function breakdown()
    {
        return $this->hasMany(Breakdown::class, 'random_id');
    }
}
