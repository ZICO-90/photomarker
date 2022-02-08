<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        
    ];

    public function Type_services (){
      return $this->hasMany(TypeService::class ,'service_id','id');

    }

    public function Service_Photoes (){
        return $this->hasMany(TypeServicePhoto::class ,'service_id','id');
  
      }


}
