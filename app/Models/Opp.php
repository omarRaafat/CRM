<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Opp extends Model
{
    use HasFactory;

    protected $table = "opps";
    //name	size	date_of_opp	closing_date	clients	contacts	status	source	percentage
    protected $fillable = ["cost" , "selling_price" , "quota" , "name" , "description" , "size" , "date_of_opp" , "closing_date" , "clients" , "contacts" , "status" , "source" , "percentage" , "owner" ];
  
    public function has_owner(){
        return $this->belongsTo('App\Models\User' , 'owner');
    }

  
}
