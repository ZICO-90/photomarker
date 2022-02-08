<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_service',
        'contact_id',
        'type_service_id',
        'type_service_photos_id',
        
    ];

    public function contact()
    {
        return belongsTo(Contact::class , 'contact_id','id');
    }

    public function Type_Service()
    {
        return belongsTo(TypeService::class , 'type_service_id','id');
    }

    public function Service_Photo()
    {
        return belongsTo(TypeServicePhoto::class , 'type_service_photos_id','id');
    }



}
