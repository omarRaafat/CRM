<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadAssign extends Model
{
    use HasFactory;
    protected $table = "leads_assigns";
    //opp_id	user_id
    protected $fillable = ["lead_id" , "user_id"];

    public function lead(){
        return $this->belongsTo('App\Models\Lead' , 'lead_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User' , 'user_id');
    }
 
}
