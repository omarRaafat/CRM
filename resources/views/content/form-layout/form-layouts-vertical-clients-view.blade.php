@extends('layouts/contentNavbarLayout')

@section('title', ' View Client Info')
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Clients/</span> View Client Info</h4>

<!-- Basic Layout -->
<div class="row ">
 
  <div class="col-xl ">


    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
     
        <h5 class="mb-0">Basic Info</h5>
     
        <small class="text-muted float-end"></small>
      </div>
      <div class="card-body">
        <form action="{{@route('client.update' , $client->id)}}" method="POST" id="target">
          @csrf
          <div class="mb-3">
            <label class="form-label " for="basic-icon-default-fullname">Name *</label>
            <div class="input-group input-group-merge ">
              <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
              <input type="text"  name="name" value="{{$client->name}}" class="form-control @error('name') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="AHMED EL HARBY" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" disabled />
             
            </div>
            @error('name')
    <span class="text-danger">{{ $message }}</span>
@enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-company">Website</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
              <input type="text" name="website" value="{{$client->website}}" id="basic-icon-default-company" class="form-control wb" placeholder="UBMRELLA.SA" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" disabled />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-email">Industry * </label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-box"></i></span>
              <input type="text" name="industry" value="{{$client->industry}}" id="basic-icon-default-email" class="form-control @error('industry') is-invalid @enderror" placeholder="ORGANIZATION INDUSTRY" aria-label="john.doe" aria-describedby="basic-icon-default-email2" disabled />
              <!-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span> -->
            </div>
            @error('industry')
    <span class="text-danger">{{ $message }}</span>
@enderror
            <div class="form-text"> You can use letters, numbers & periods </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-address">Address Line 1</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-phone"></i></span>
              <input type="text" name="address_line_1" value="{{$client->address_line_1}}" id="basic-icon-default-address" class="form-control phone-mask" placeholder="658 799 8941" aria-label="HOME 1" aria-describedby="basic-icon-default-phone2" disabled />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-address2">- Address Line 2</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-comment"></i></span>
              <input type="text" name="address_line_2" value="{{$client->address_line_2}}" id="basic-icon-default-address2" class="form-control phone-mask" placeholder="HOME 2" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" disabled />
            </div>
          </div>
          
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-address2">Post code</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-comment"></i></span>
              <input type="text" name="post_code" value="{{$client->post_code}}" id="basic-icon-default-address2" class="form-control phone-mask" placeholder="HOME 2" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" disabled />
            </div>
          </div>
         
       
      </div>
    </div>
  </div>

  <div class="col-xl ">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Contact Info</h5>
        <small class="text-muted float-end">Complete Info</small>
      </div>
      <div class="card-body">
       
         
        
          
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-address2">Main Telephone * </label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-comment"></i></span>
              <input type="text" name="main_telephone" value="{{$client->main_telephone}}" id="basic-icon-default-address2" class="form-control phone-mask  @error('main_telephone') is-invalid @enderror" placeholder="+966000000" aria-label="658 799 8941" disabled aria-describedby="basic-icon-default-phone2" />
            </div>
            @error('main_telephone')
    <span class="text-danger">{{ $message }}</span>
@enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-address2">Secondary Telephone </label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-comment"></i></span>
              <input type="text" name="secondry_telephone" value="{{$client->secondry_telephone}}" id="basic-icon-default-address2" class="form-control phone-mask" placeholder="+966000000" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" disabled />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-address2">Main Email Address</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-envelope"></i></span>
              <input type="email" name="main_email_address" value="{{$client->main_email_address}}" id="basic-icon-default-email" class="form-control" placeholder="ORGANIZATION INDUSTRY" aria-label="john.doe" aria-describedby="basic-icon-default-email2" disabled />
                      <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>

            </div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-country"> Country </label>
            <!-- <div class="input-group input-group-merge"> -->
            <!-- <div id="dropdown"  class="form-control  @error('country') is-invalid @enderror"></div> -->
            <input type="text" name="country" class="form-control" value="{{$client->_country->name_en}}" id="" disabled/>
                      <!-- </div> -->
                      <!-- @error('country')
    <span class="text-danger">{{ $message }}</span>
@enderror -->
            </div>

            <div class="mb-3">
            <label class="form-label" for="basic-icon-default-country">Enter City Name</label>
            <div class="input-group input-group-merge">
        
            <input type="text" name="city" value="{{$client->_city->name_en}}" id="basic-icon-default-address2" class="form-control phone-mask" placeholder="eldamamd " aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" disabled/>

        </div>
            </div>
         
<br><br>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
var countries = [
    { "text": "Afghanistan", "value": "AF" },
    { "text": "Åland Islands", "value": "AX" },
    { "text": "Albania", "value": "AL" },
    { "text": "Algeria", "value": "DZ" },
    { "text": "American Samoa", "value": "AS" },
    { "text": "Andorra", "value": "AD" },
    { "text": "Angola", "value": "AO" },
    { "text": "Anguilla", "value": "AI" },
    { "text": "Antarctica", "value": "AQ" },
    { "text": "Antigua and Barbuda", "value": "AG" },
    { "text": "Argentina", "value": "AR" },
    { "text": "Armenia", "value": "AM" },
    { "text": "Aruba", "value": "AW" },
    { "text": "Australia", "value": "AU" },
    { "text": "Austria", "value": "AT" },
    { "text": "Azerbaijan", "value": "AZ" },
    { "text": "Bahamas", "value": "BS" },
    { "text": "Bahrain", "value": "BH" },
    { "text": "Bangladesh", "value": "BD" },
    { "text": "Barbados", "value": "BB" },
    { "text": "Belarus", "value": "BY" },
    { "text": "Belgium", "value": "BE" },
    { "text": "Belize", "value": "BZ" },
    { "text": "Benin", "value": "BJ" },
    { "text": "Bermuda", "value": "BM" },
    { "text": "Bhutan", "value": "BT" },
    { "text": "Bolivia", "value": "BO" },
    { "text": "Bosnia and Herzegovina", "value": "BA" },
    { "text": "Botswana", "value": "BW" },
    { "text": "Bouvet Island", "value": "BV" },
    { "text": "Brazil", "value": "BR" },
    { "text": "British Indian Ocean Territory", "value": "IO" },
    { "text": "Brunei Darussalam", "value": "BN" },
    { "text": "Bulgaria", "value": "BG" },
    { "text": "Burkina Faso", "value": "BF" },
    { "text": "Burundi", "value": "BI" },
    { "text": "Cambodia", "value": "KH" },
    { "text": "Cameroon", "value": "CM" },
    { "text": "Canada", "value": "CA" },
    { "text": "Cape Verde", "value": "CV" },
    { "text": "Cayman Islands", "value": "KY" },
    { "text": "Central African Republic", "value": "CF" },
    { "text": "Chad", "value": "TD" },
    { "text": "Chile", "value": "CL" },
    { "text": "China", "value": "CN" },
    { "text": "Christmas Island", "value": "CX" },
    { "text": "Cocos (Keeling) Islands", "value": "CC" },
    { "text": "Colombia", "value": "CO" },
    { "text": "Comoros", "value": "KM" },
    { "text": "Congo", "value": "CG" },
    { "text": "Congo, The Democratic Republic of the", "value": "CD" },
    { "text": "Cook Islands", "value": "CK" },
    { "text": "Costa Rica", "value": "CR" },
    { "text": "Cote D'Ivoire", "value": "CI" },
    { "text": "Croatia", "value": "HR" },
    { "text": "Cuba", "value": "CU" },
    { "text": "Cyprus", "value": "CY" },
    { "text": "Czech Republic", "value": "CZ" },
    { "text": "Denmark", "value": "DK" },
    { "text": "Djibouti", "value": "DJ" },
    { "text": "Dominica", "value": "DM" },
    { "text": "Dominican Republic", "value": "DO" },
    { "text": "Ecuador", "value": "EC" },
    { "text": "Egypt", "value": "EG" },
    { "text": "El Salvador", "value": "SV" },
    { "text": "Equatorial Guinea", "value": "GQ" },
    { "text": "Eritrea", "value": "ER" },
    { "text": "Estonia", "value": "EE" },
    { "text": "Ethiopia", "value": "ET" },
    { "text": "Falkland Islands (Malvinas)", "value": "FK" },
    { "text": "Faroe Islands", "value": "FO" },
    { "text": "Fiji", "value": "FJ" },
    { "text": "Finland", "value": "FI" },
    { "text": "France", "value": "FR" },
    { "text": "French Guiana", "value": "GF" },
    { "text": "French Polynesia", "value": "PF" },
    { "text": "French Southern Territories", "value": "TF" },
    { "text": "Gabon", "value": "GA" },
    { "text": "Gambia", "value": "GM" },
    { "text": "Georgia", "value": "GE" },
    { "text": "Germany", "value": "DE" },
    { "text": "Ghana", "value": "GH" },
    { "text": "Gibraltar", "value": "GI" },
    { "text": "Greece", "value": "GR" },
    { "text": "Greenland", "value": "GL" },
    { "text": "Grenada", "value": "GD" },
    { "text": "Guadeloupe", "value": "GP" },
    { "text": "Guam", "value": "GU" },
    { "text": "Guatemala", "value": "GT" },
    { "text": "Guernsey", "value": "GG" },
    { "text": "Guinea", "value": "GN" },
    { "text": "Guinea-Bissau", "value": "GW" },
    { "text": "Guyana", "value": "GY" },
    { "text": "Haiti", "value": "HT" },
    { "text": "Heard Island and Mcdonald Islands", "value": "HM" },
    { "text": "Holy See (Vatican City State)", "value": "VA" },
    { "text": "Honduras", "value": "HN" },
    { "text": "Hong Kong", "value": "HK" },
    { "text": "Hungary", "value": "HU" },
    { "text": "Iceland", "value": "IS" },
    { "text": "India", "value": "IN" },
    { "text": "Indonesia", "value": "ID" },
    { "text": "Iran, Islamic Republic Of", "value": "IR" },
    { "text": "Iraq", "value": "IQ" },
    { "text": "Ireland", "value": "IE" },
    { "text": "Isle of Man", "value": "IM" },
    { "text": "Israel", "value": "IL" },
    { "text": "Italy", "value": "IT" },
    { "text": "Jamaica", "value": "JM" },
    { "text": "Japan", "value": "JP" },
    { "text": "Jersey", "value": "JE" },
    { "text": "Jordan", "value": "JO" },
    { "text": "Kazakhstan", "value": "KZ" },
    { "text": "Kenya", "value": "KE" },
    { "text": "Kiribati", "value": "KI" },
    { "text": "Korea, Democratic People'S Republic of", "value": "KP" },
    { "text": "Korea, Republic of", "value": "KR" },
    { "text": "Kuwait", "value": "KW" },
    { "text": "Kyrgyzstan", "value": "KG" },
    { "text": "Lao People'S Democratic Republic", "value": "LA" },
    { "text": "Latvia", "value": "LV" },
    { "text": "Lebanon", "value": "LB" },
    { "text": "Lesotho", "value": "LS" },
    { "text": "Liberia", "value": "LR" },
    { "text": "Libyan Arab Jamahiriya", "value": "LY" },
    { "text": "Liechtenstein", "value": "LI" },
    { "text": "Lithuania", "value": "LT" },
    { "text": "Luxembourg", "value": "LU" },
    { "text": "Macao", "value": "MO" },
    { "text": "Macedonia, The Former Yugoslav Republic of", "value": "MK" },
    { "text": "Madagascar", "value": "MG" },
    { "text": "Malawi", "value": "MW" },
    { "text": "Malaysia", "value": "MY" },
    { "text": "Maldives", "value": "MV" },
    { "text": "Mali", "value": "ML" },
    { "text": "Malta", "value": "MT" },
    { "text": "Marshall Islands", "value": "MH" },
    { "text": "Martinique", "value": "MQ" },
    { "text": "Mauritania", "value": "MR" },
    { "text": "Mauritius", "value": "MU" },
    { "text": "Mayotte", "value": "YT" },
    { "text": "Mexico", "value": "MX" },
    { "text": "Micronesia, Federated States of", "value": "FM" },
    { "text": "Moldova, Republic of", "value": "MD" },
    { "text": "Monaco", "value": "MC" },
    { "text": "Mongolia", "value": "MN" },
    { "text": "Montserrat", "value": "MS" },
    { "text": "Morocco", "value": "MA" },
    { "text": "Mozambique", "value": "MZ" },
    { "text": "Myanmar", "value": "MM" },
    { "text": "Namibia", "value": "NA" },
    { "text": "Nauru", "value": "NR" },
    { "text": "Nepal", "value": "NP" },
    { "text": "Netherlands", "value": "NL" },
    { "text": "Netherlands Antilles", "value": "AN" },
    { "text": "New Caledonia", "value": "NC" },
    { "text": "New Zealand", "value": "NZ" },
    { "text": "Nicaragua", "value": "NI" },
    { "text": "Niger", "value": "NE" },
    { "text": "Nigeria", "value": "NG" },
    { "text": "Niue", "value": "NU" },
    { "text": "Norfolk Island", "value": "NF" },
    { "text": "Northern Mariana Islands", "value": "MP" },
    { "text": "Norway", "value": "NO" },
    { "text": "Oman", "value": "OM" },
    { "text": "Pakistan", "value": "PK" },
    { "text": "Palau", "value": "PW" },
    { "text": "Palestinian Territory, Occupied", "value": "PS" },
    { "text": "Panama", "value": "PA" },
    { "text": "Papua New Guinea", "value": "PG" },
    { "text": "Paraguay", "value": "PY" },
    { "text": "Peru", "value": "PE" },
    { "text": "Philippines", "value": "PH" },
    { "text": "Pitcairn", "value": "PN" },
    { "text": "Poland", "value": "PL" },
    { "text": "Portugal", "value": "PT" },
    { "text": "Puerto Rico", "value": "PR" },
    { "text": "Qatar", "value": "QA" },
    { "text": "Reunion", "value": "RE" },
    { "text": "Romania", "value": "RO" },
    { "text": "Russian Federation", "value": "RU" },
    { "text": "RWANDA", "value": "RW" },
    { "text": "Saint Helena", "value": "SH" },
    { "text": "Saint Kitts and Nevis", "value": "KN" },
    { "text": "Saint Lucia", "value": "LC" },
    { "text": "Saint Pierre and Miquelon", "value": "PM" },
    { "text": "Saint Vincent and the Grenadines", "value": "VC" },
    { "text": "Samoa", "value": "WS" },
    { "text": "San Marino", "value": "SM" },
    { "text": "Sao Tome and Principe", "value": "ST" },
    { "text": "Saudi Arabia", "value": "SA" },
    { "text": "Senegal", "value": "SN" },
    { "text": "Serbia and Montenegro", "value": "CS" },
    { "text": "Seychelles", "value": "SC" },
    { "text": "Sierra Leone", "value": "SL" },
    { "text": "Singapore", "value": "SG" },
    { "text": "Slovakia", "value": "SK" },
    { "text": "Slovenia", "value": "SI" },
    { "text": "Solomon Islands", "value": "SB" },
    { "text": "Somalia", "value": "SO" },
    { "text": "South Africa", "value": "ZA" },
    { "text": "South Georgia and the South Sandwich Islands", "value": "GS" },
    { "text": "Spain", "value": "ES" },
    { "text": "Sri Lanka", "value": "LK" },
    { "text": "Sudan", "value": "SD" },
    { "text": "Suriname", "value": "SR" },
    { "text": "Svalbard and Jan Mayen", "value": "SJ" },
    { "text": "Swaziland", "value": "SZ" },
    { "text": "Sweden", "value": "SE" },
    { "text": "Switzerland", "value": "CH" },
    { "text": "Syrian Arab Republic", "value": "SY" },
    { "text": "Taiwan, Province of China", "value": "TW" },
    { "text": "Tajikistan", "value": "TJ" },
    { "text": "Tanzania, United Republic of", "value": "TZ" },
    { "text": "Thailand", "value": "TH" },
    { "text": "Timor-Leste", "value": "TL" },
    { "text": "Togo", "value": "TG" },
    { "text": "Tokelau", "value": "TK" },
    { "text": "Tonga", "value": "TO" },
    { "text": "Trinidad and Tobago", "value": "TT" },
    { "text": "Tunisia", "value": "TN" },
    { "text": "Turkey", "value": "TR" },
    { "text": "Turkmenistan", "value": "TM" },
    { "text": "Turks and Caicos Islands", "value": "TC" },
    { "text": "Tuvalu", "value": "TV" },
    { "text": "Uganda", "value": "UG" },
    { "text": "Ukraine", "value": "UA" },
    { "text": "United Arab Emirates", "value": "AE" },
    { "text": "United Kingdom", "value": "GB" },
    { "text": "United States", "value": "US", synonym: ['USA','United States of America'] },
    { "text": "United States Minor Outlying Islands", "value": "UM" },
    { "text": "Uruguay", "value": "UY" },
    { "text": "Uzbekistan", "value": "UZ" },
    { "text": "Vanuatu", "value": "VU" },
    { "text": "Venezuela", "value": "VE" },
    { "text": "Viet Nam", "value": "VN" },
    { "text": "Virgin Islands, British", "value": "VG" },
    { "text": "Virgin Islands, U.S.", "value": "VI" },
    { "text": "Wallis and Futuna", "value": "WF" },
    { "text": "Western Sahara", "value": "EH" },
    { "text": "Yemen", "value": "YE" },
    { "text": "Zambia", "value": "ZM" },
    { "text": "Zimbabwe", "value": "ZW" }
];

for (var i = 0; i < countries.length; i++) {
    countries[i].image = 'https://cdn.jsdelivr.net/npm/svg-country-flags@1.2.10/svg/' + countries[i].value.toLowerCase() + '.svg';
}

jSuites.dropdown(document.getElementById('dropdown'), {
    data: countries,
    autocomplete: true,
    multiple: false,
    width: '280px',
});


;
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

function replace_country(){
  var cn = $('.jss_object').val();
  if (cn !== '') {
    $('#mycountry').val(cn);

  }
}
 
$( "#target :input" ).prop( "disabled", true );
     
  
  </script>
@endsection
