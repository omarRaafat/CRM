<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ImportContact implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            // first_name	last_name	job_title	address_line_1	address_line_2	city	post_code	country	work_telephone	mobile_telephone	email	status	prefix	client_id	social_profiles	tags

        return new Contact([
          'first_name' => $row['first_name'],
          'last_name' => $row['last_name'],
          'job_title' => $row['job_title'],
          'address_line_1' => $row['address_line_1'],
          'address_line_2' => $row['address_line_2'],
          'city' => $row['city'],
          'post_code' => $row['post_code'],
          'country' => $row['country'],
          'work_telephone' => $row['work_telephone'],
          'mobile_telephone' => $row['mobile_telephone'],
          'email' => $row['email'],
          'prefix' => $row['prefix'],
          'client_id' => $row['client_id'],
          'social_profiles' => $row['social_profiles'],
          'tags' => $row['tags']
        
       

         

        ]);
    }
}
