<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Event extends Model
{
    use HasFactory;

    protected $table = "events";
    protected $fillable = ["name","description","start_date","end_date","city","images","location","badges","sessions","landing_page","guest_type"];
  
   
      
      
}
