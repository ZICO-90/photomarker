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
       
        
    ];

    public function contact_orders()
    {
        return $this->hasMany(ContactOrder::class,'contact_id','id');
    }

    



}
