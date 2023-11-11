<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\client;
class Contact extends Model
{
    use HasFactory;
    protected $table = "contacts";
    // first_name	last_name	job_title	address_line_1	address_line_2	city	post_code	country	work_telephone	mobile_telephone	email	status	prefix	client_id	social_profiles	tags
    protected $fillable = ["first_name" , "last_name" , "job_title" , "address_line_1" , "address_line_2" , "city" , "post_code" , "country", "work_telephone", "mobile_telephone" , "email" ,"prefix" , "client_id" , "social_profiles" ,"tags"];
  
    public function client(){
        return $this->belongsTo('App\Models\Client' , 'client_id');
    }

}

