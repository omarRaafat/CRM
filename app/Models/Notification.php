<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Notification extends Model
{
    use HasFactory;

    protected $table = "notifications";
    protected $fillable = ["user" , "action"];
  
    public function which_user(){
        return $this->belongsTo('App\Models\User' , 'user');
    }

 
}
