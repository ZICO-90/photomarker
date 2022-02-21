<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_nam',
        'activity_type',
        'number_call',
        'email',
        'file_url',
        'servieces',
       
        
    ];
    protected $casts = ['servieces' => 'json'];


}
