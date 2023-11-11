<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Lead extends Model
{
    use HasFactory;

    protected $table = "leads";
    protected $fillable = ["name" , "client" , "contact" , "status" , "source" , "description" , "size" ,"closing_date" , "sales_user" , "request_status"];
  
    public function has_client(){
        return $this->belongsTo('App\Models\Client' , 'client');
    }

    public function has_contact(){
        return $this->belongsTo('App\Models\Contact' , 'contact');
    }

    public function getRequestStatusAttribute($request_status){
        if($request_status == 1){
            return "Accepted";
        }
      
        else  if($request_status == 2) {
            return "Rejected";
        }else {
            return "Pending";
        }
    }
}
