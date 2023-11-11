<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\City;
class Client extends Model
{
    use HasFactory;
    protected $table = "clients";
    // name	website	industry	address_line_1	address_line_2	city	post_code	country	main_telephone	secondary_telephone	main_email_address	
    protected $fillable = ["name" , "website" , "industry" , "address_line_1" , "address_line_2" , "city" , "post_code" , "country" , "main_telephone" , "secondary_telephone" , "main_email_address"];
  
    
     public function _country(){
        return $this->belongsTo('App\Models\Country' , "country");
     }

     public function _city(){
        return $this->belongsTo('App\Models\City' , "city");
     }

}
