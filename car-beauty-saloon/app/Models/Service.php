<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Saloon as S;

class Service extends Model
{
    use HasFactory;
    public function getService()
    {
        return $this->belongsTo(S::class, 'saloon_id', 'id');
    }
}
