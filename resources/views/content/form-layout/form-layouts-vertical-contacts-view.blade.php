@extends('layouts/contentNavbarLayout')

@section('title', ' View Contact Info')
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
<style type="text/css">
    .bootstrap-tagsinput .tag {
      margin-right: 2px;
      color: white !important;
      background-color: #0d6efd;
      padding: 0.2rem;
      width:100%
    }

 
  </style>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
      rel="stylesheet"
    />
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Contacts/</span> View Contact Info</h4>

<!-- Basic Layout -->
<div class="card"> 
  <form action="{{@route('contact.update' , $contact->id)}}" method="POST" id="target">
                @csrf 
        <div class="row ">
        

            

                <div class="col-md-6">
                  
                  <div class="card-header d-flex justify-content-between align-items-center">
                
                    <h5 class="mb-0"></h5>
                
                    <small class="text-muted float-end"> * are required</small>
                  </div>
                  <div class="card-body">
                  
                      <div class="mb-3">
                        <label class="form-label " for="basic-icon-default-fullname">First Name *</label>
                        <div class="input-group input-group-merge ">
                          <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                          <input type="text"  name="first_name"  value="{{$contact->first_name}}" class="form-control @error('first_name') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="AHMED EL HARBY" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                        
                        </div>
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Last Name *</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                          <input type="text" name="last_name"  value="{{$contact->last_name}}" id="basic-icon-default-company" class="form-control wb @error('last_name') is-invalid @enderror " placeholder="UBMRELLA.SA" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Job title  </label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text"><i class="bx bx-box"></i></span>
                          <input type="text" name="job_title"  value="{{$contact->job_title}}" id="basic-icon-default-email" class="form-control @error('industry') is-invalid @enderror" placeholder="ORGANIZATION INDUSTRY" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                          <!-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>  -->
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
                          <input type="text" name="address_line_1"  value="{{$contact->address_line_1}}" id="basic-icon-default-address" class="form-control phone-mask" placeholder="658 799 8941" aria-label="HOME 1" aria-describedby="basic-icon-default-phone2" />
                        </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-address2">Address Line 2</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-comment"></i></span>
                          <input type="text" name="address_line_2"  value="{{$contact->address_line_2}}" id="basic-icon-default-address2" class="form-control phone-mask" placeholder="HOME 2" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                      </div>
                      
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-country">Select Country </label>
                        <div class="input-group input-group-merge">
                        <div id="dropdown"  class="form-control  @error('country') is-invalid @enderror"></div>
                        <input type="hidden" name="country"  value="{{$contact->country}}" id="mycountry"/>
                                  </div>
                                              @error('country')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-country">Enter City Name</label>
                            <div class="input-group input-group-merge">
                        
                            <input type="text" name="city"  value="{{$contact->city}}"id="basic-icon-default-address2" class="form-control phone-mask" placeholder="eldamamd " aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />

                          </div>
                        </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-address2">Post code</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-comment"></i></span>
                          <input type="text" name="post_code"  value="{{$contact->post_code}}" id="basic-icon-default-address2" class="form-control phone-mask" placeholder="HOME 2" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div> 
                      </div>
                    

                  
                  </div> 
                </div>
            

            
                <div class="col-md-6">
                
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                    <small class="text-muted float-end">* are Required</small>
                  </div>

                  <div class="card-body">
                  
                    
                    
                      
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-address2">Work Telephone  </label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-comment"></i></span>
                          <input type="text" name="work_telephone" value="{{$contact->work_telephone}}" id="basic-icon-default-address2" class="form-control phone-mask  " placeholder="+966000000" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                                    
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-address2">Mobile Telephone * </label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-comment"></i></span>
                          <input type="text" name="mobile_telephone" value="{{$contact->mobile_telephone}}" id="basic-icon-default-address2" class="form-control phone-mask @error('mobile_telephone') is-invalid @enderror" placeholder="+966000000" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                        @error('mobile_telephone')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-address2"> Email Address *</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-envelope"></i></span>
                          <input type="email" name="email" value="{{$contact->email}}" id="basic-icon-default-email" class="form-control  @error('email') is-invalid @enderror" placeholder="ORGANIZATION INDUSTRY" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                                  <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>

                        </div>
                        @error('email')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>

                     
                      <!-- <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                        <select class="form-select" id="exampleFormControlSelect1" name="status" aria-label="Default select example">
                          <option selected disabled>Open this select menu</option>
                          <option value="1">st1 </option>
                          <option value="2">st2</option>
                          <option value="3">st3</option>
                        </select>
                     </div> -->

                     <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Prefix</label>
                        <select class="form-select" name="prefix" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected > Mr / Mrs </option>
                          <option value="Mr">Mr</option>
                          <option value="Mrs">Mrs</option>
                          <option value="Dr">Dr </option>
                          <option value="Miss">Miss </option>
                          <option value="Prof">Prof  </option>
                          <option value="Eng">Eng  </option>

                        </select>
                     </div>

                     <div>
                        <label for="exampleFormControlTextarea1" class="form-label">Social Profiles</label>
                        <textarea class="form-control" name="social_profiles" id="exampleFormControlTextarea1" rows="3">{{$contact->email}}</textarea>
                      </div>
                        
                      <div class="mb-3" style=" margin-top: 12px;">
                        <label for="exampleFormControltags" class="form-label">Contact tags </label>
                        <div class="input-group input-group-merge">
                          <input
                            type="text"
                            class="form-control"
                            data-role="tagsinput"
                            id="exampleFormControltags"
                            name="tags"
                            value="{{$contact->tags}}"
                          />
                        </div>

                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Clients</label>
                        <select class="form-select @error('client_id') is-invalid @enderror" name="client_id" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>choose one of registered clients</option>
                           @foreach($clients as $client)
                          <option value="{{$client->id}}" @if($client->id == $contact->client_id) selected @endif>{{$client->name}} </option>
                            @endforeach
                        </select>
                        @error('client_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                     </div>

                  </div>


                </div>
              

                
               
               

          

        </div>
  </form>

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
 
 
     
  
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <script>
    $(function () {
      $('input')
        .on('change', function (event) {
          var $element = $(event.target);
          var $container = $element.closest('.example');

          if (!$element.data('tagsinput')) return;

          var val = $element.val();
          if (val === null) val = 'null';
          var items = $element.tagsinput('items');

          $('code', $('pre.val', $container)).html(
            $.isArray(val)
              ? JSON.stringify(val)
              : '"' + val.replace('"', '\\"') + '"'
          );
          $('code', $('pre.items', $container)).html(
            JSON.stringify($element.tagsinput('items'))
          );
        })
        .trigger('change');
    });

    $( "#target :input" ).prop( "disabled", true );
  </script>
@endsection
