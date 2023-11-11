@extends('layouts/contentNavbarLayout')

@section('title', ' Update Opportunity Info')
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
<style type="text/css">
 #size_input {
  /* number-format: decimal-comma; */
}
  </style>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
      rel="stylesheet"
    />
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Opportunities / </span>View - Update Opportunity Info</h4>

<!-- Basic Layout -->
<div class="card container" style="width:80%"> 
  <form action="{{@route('opp.update' , $opp->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
      
        

            

               
                  
                  <div class="card-header d-flex justify-content-between align-items-center">
                
                    <h5 class="mb-0"></h5>
                
                    <small class="text-muted float-end"> * are required</small>
                  </div>
                  <div class="card-body">
                  

                  <div class="mb-3">
                        <label class="form-label " for="basic-icon-default-fullname"> OPP OWNER </label>
                        <div class="input-group input-group-merge ">
                          <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                          <input type="text" disabled   value="{{$opp->has_owner->name}}"  class="form-control @error('name') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                        
                        </div>
                       
                      </div>

                      <div class="mb-3">
                        <label class="form-label " for="basic-icon-default-fullname"> Name *</label>
                        <div class="input-group input-group-merge ">
                          <input type="text"  name="name" value="{{$opp->name}}"  class="form-control @error('name') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                        
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$opp->description}} </textarea>
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Selling Price *</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text">SAR</span>
                          <input type="text"   name="size" value="{{$opp->size}}" min="0" id="size_input"  class="form-control wb @error('size') is-invalid @enderror price_number " placeholder="" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                       
                        @error('size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Cost </label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text">SAR</span>
                          <input type="text" name="cost" onkeyup="costError()" value="{{$opp->cost}}" min="0" id="cost_input" class="form-control wb @error('cost') is-invalid @enderror price_number " placeholder="" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                        <span class="text-danger" style="display:none" id="cost_error"></span>
                        @error('cost')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <!-- <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Selling Price (SAR) </label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-pound"></i></span>
                          <input type="number" name="selling_price" value="{{$opp->selling_price}}" min="0" id="basic-icon-default-company" class="form-control wb @error('selling_price') is-invalid @enderror " placeholder="UBMRELLA.SA" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                        @error('selling_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div> -->
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Closing Date *  </label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text"><i class="bx bx-box"></i></span>
                          <input type="date" name="closing_date" value="{{$opp->closing_date}}" id="basic-icon-default-email" class="form-control @error('closing_date') is-invalid @enderror" placeholder="" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                          <!-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>  -->
                        </div> 
                        @error('closing_date') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!-- <div class="form-text"> You can use letters, numbers & periods </div> -->
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Clients *</label>
                        <select class="form-select @error('clients') is-invalid @enderror" id="clients_select" name="clients" onchange="getContactsFromClient()" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>choose one of registered clients</option>
                           @foreach($clients as $client)
                          <option value="{{$client->id}}"  @if($client->id == $opp->clients) selected @endif>{{$client->name}} </option>
                            @endforeach
                        </select>
                        @error('clients') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="mb-3" id="contact_div" >
                        <label for="exampleFormControlSelect1" class="form-label">Contacts *</label>
                        <select class="form-select content_container @error('contacts') is-invalid @enderror " name="contacts" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>choose one of registered CONTACTS</option>
                          @foreach($contacts_clients as $contact_client)
                          <option value="{{$client->id}}" selected >{{$contact_client->first_name . $contact_client->last_name}} </option>
                            @endforeach
                        </select>
                        @error('contacts') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                      
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Status *</label>
                        <select class="form-select" name="status" id="exampleFormControlSelect1" aria-label="Default select example" required>
                          <option selected disabled > select one status from provided </option>
                          <option value="Qualify" @if($opp->status == "Qualify") selected @endif>Qualify</option>
                          <option value="Develop" @if($opp->status == "Develop") selected @endif>Develop</option>
                          <option value="Propose" @if($opp->status == "Propose") selected @endif>Propose</option>
                          <option value="Negotiate" @if($opp->status == "Negotiate") selected @endif>Negotiate</option>
                          <option value="Closed Won" @if($opp->status == "Closed Won") selected @endif>Closed Won</option>
                          <option value="Closed Lost" @if($opp->status == "Closed Lost") selected @endif>Closed Lost</option>


                        </select>

                        @error('status') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>


                     <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Source *</label>
                        <select class="form-select @error('source') is-invalid @enderror" id="myselect"  name="source" onchange="getSourceValue()" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled> select opp source </option>
                        
                          <option value="Direct" @if($opp->source == "Direct") selected @endif>Direct </option>
                          <option value="Marketing" @if($opp->source == "Marketing") selected @endif>Marketing  </option>
                          <option value="Other"  >Other  </option>

                        </select>
                        
                     </div>
                     @error('source')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        
                     <div class="mb-3" style="display:none" id="source_other">
                        <label for="exampleFormControlSelect1" class="form-label">Enter Opp Source *</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-comment"></i></span>
                          <input type="text"  id="source_other_input" class="form-control phone-mask " placeholder="for ex : sales or any" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                      
                     </div>
                    
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Quotation</label>
                        <input class="form-control" type="file" name="quota" id="formFile">
                      </div>
                  
                  </div> 
              
            
                  <div  >
                      <input type="submit" id="submit_button" onclick="replace_country()" class="btn btn-info btn-block " value="Assign Update"/>  
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
  $('#mycountry').val(cn);
}
 
 
function getSourceValue(){
  var sourceValue = $( "#myselect option:selected" ).val();
  if (sourceValue == "Other") {
     $("#source_other").css('display' , 'block');
     $('#source_other_input').attr('name' , 'source');
  }else{
    $("#source_other").css('display' , 'none');
    $('#source_other_input').removeAttr('name' );
  }
}

function getContactsFromClient(){
  var sourceValue = $( "#clients_select option:selected" ).val();
   $.ajax({
  url:"{{url('/opp/contact/from/clients/')}}"+"/"+sourceValue,
    method:'GET',
    success:function (response) {
      $('#contact_div').css("display" , 'block');
      $('.content_container').empty();
      for (var pointer = 0; pointer < response.length ; pointer++) {
         $('.content_container').append("<option value="+response[pointer].id+" >"+response[pointer].first_name +' '+ response[pointer].last_name+"</option>")
        
      }
  
    }
   })
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

 
  </script>

 
       
       <script>
$(document).ready(function() {
    // Function to format number with commas
    function numberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Event listener for input field
    $('.price_number').on('input', function() {
        // Get the input value
        var inputValue = $(this).val();
        
        // Remove commas from the input value and parse it as a number
        var numericValue = parseFloat(inputValue.replace(/,/g, ''));
        
        // Check if the input is a valid number
        if (!isNaN(numericValue)) {
            // Format the number with commas
            var formattedValue = numberWithCommas(numericValue);
            
            // Set the formatted value back to the input field
            $(this).val(formattedValue);
        } else {
            // If the input is not a valid number, clear the input field
            $(this).val('');
        }
    });
});
</script>

     
   <script>

function costError(){
      if(parseInt($('#cost_input').val().replace(/,/g, '')) >= parseInt($('#size_input').val().replace(/,/g, ''))){
        $('#submit_button').prop('disabled' , true);
        $('#cost_error').css('display' , 'block').text('cost value must be less than size value');
      }else{
        $('#submit_button').prop('disabled' , false);
        $('#cost_error').css('display' , 'none').text('');

      }
    }
</script>
  
@endsection
