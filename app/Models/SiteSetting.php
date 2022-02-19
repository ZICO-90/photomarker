<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
   
    use HasFactory;
    protected $fillable = [
        'title',
        'email',
        'phone',
        'url_pdf',
        'social_media'
        
    ];

    protected $casts = ['social_media' => 'json'];
}
