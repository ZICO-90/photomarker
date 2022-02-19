<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'title',
    ];

    public function photos()
    {
        return $this->hasMany(ChildPhoto::class,'photos_id','id');
    }
}
