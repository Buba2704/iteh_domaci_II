<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pozajmica extends Model
{
    use HasFactory;
    protected $guarded=[''];

    public function knjiga(){
        return $this->belongsTo(Knjiga::class);
    }
    public function clan(){
        return $this->belongsTo(Clan::class);
    }
}
