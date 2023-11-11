<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class City extends Model
{
    use HasFactory;
    protected $table = "cities";
    // name	website	industry	address_line_1	address_line_2	city	post_code	country	main_telephone	secondary_telephone	main_email_address	
    protected $fillable = ["name_ar" , "name_en" , "code" , "country_id"];
  
    
    public function getNameAttribute(){

        return $this->{'name_'.App::getLocale()};

        }  

}
