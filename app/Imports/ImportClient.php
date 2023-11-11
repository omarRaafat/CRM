<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportClient implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            // name	website	industry	address_line_1	address_line_2	city	post_code	country	main_telephone	secondary_telephone	main_email_address	

        return new Client([
            'name' => $row['name'],
            'website' => $row['website'],
            'industry' => $row['industry'],
            'address_line_1' => $row['address_line_1'],
            'address_line_2' => $row['address_line_2'],
            'city' => $row['city'],
            'post_code' => $row['post_code'],
            'country' => $row['country'],
            'main_telephone' => $row['main_telephone'],
            'secondary_telephone' => $row['secondary_telephone'],
            'main_email_address' => $row['main_email_address']
         
          
        ]);
    }
}
