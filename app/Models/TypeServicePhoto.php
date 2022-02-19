<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeServicePhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_photo',
        'services_id',
        
        
    ];

 

    public function contact_orders()
    {
        return $this->hasMany(ContactOrder::class,'type_service_photos_id','id');
    }


}
