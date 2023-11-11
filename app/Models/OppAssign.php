<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OppAssign extends Model
{
    use HasFactory;
    protected $table = "opps_assigns";
    //opp_id	user_id
    protected $fillable = ["opp_id" , "user_id"];

    public function opp(){
        return $this->belongsTo('App\Models\Opp' , 'opp_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User' , 'user_id');
    }
 
}
