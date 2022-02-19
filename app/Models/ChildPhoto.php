<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildPhoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'photos_id',
    ];

    public function Photo()
    {
        
        return $this->belongsTo(ParentPhoto::class,'photos_id','id');
    }
}
