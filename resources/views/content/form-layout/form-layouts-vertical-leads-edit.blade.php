@extends('layouts/contentNavbarLayout')

@section('title', ' Update Lead Info')
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
<style type="text/css">
 
  </style>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
      rel="stylesheet"
    />
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Leads/</span>Update Lead Info</h4>

<!-- Basic Layout -->
<div class="card container" style="width:80%"> 
  <form action="{{@route('lead.update' , $lead->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
      
        

            

               
                  
                  <div class="card-header d-flex justify-content-between align-items-center">
                
                    <h5 class="mb-0"></h5>
                
                    <small class="text-muted float-end"> * are required</small>
                  </div>
                  <div class="card-body">
                  
                      <div class="mb-3">
                        <label class="form-label " for="basic-icon-default-fullname"> Lead Name *</label>
                        <div class="input-group input-group-merge ">
                          <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                          <input type="text"  name="name" value="{{$lead->name}}" class="form-control @error('name') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                        
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                     
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$lead->name}}</textarea>
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Size (SAR) *</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-pound"></i></span>
                          <input type="number" name="size" min="0" id="basic-icon-default-company" value="{{$lead->size}}" class="form-control wb @error('size') is-invalid @enderror " placeholder="" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                        @error('size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Closing Date *  </label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text"><i class="bx bx-box"></i></span>
                          <input type="date" name="closing_date" id="entrega" value="{{date('Y-m-d',strtotime($lead->closing_date))}}"  min="2018-01-01" max="2025-12-31" class="form-control flatpickr flatpickr-input active  @error('closing_date') is-invalid @enderror" placeholder="" aria-label="john.doe" aria-describedby="basic-icon-default-email2"  />
                          <!-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>  -->
                        </div> 
                        @error('closing_date') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!-- <div class="form-text"> You can use letters, numbers & periods </div> -->
                      </div>
              

                    
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Clients *</label>
                        <select class="form-select @error('clients') is-invalid @enderror" id="clients_select" name="client" onchange="getContactsFromClient()" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>choose one of registered clients</option>
                           @foreach($clients as $client)
                          <option value="{{$client->id}}" @if($client->id == $lead->client) selected @endif>{{$client->name}} </option>
                            @endforeach
                        </select>
                        @error('clients') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Contacts *</label>
                        <select class="form-select content_container @error('contacts') is-invalid @enderror " name="contact" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>choose one of registered CONTACTS</option>
                          @foreach($contacts as $contact)
                          <option value="{{$contact->id}}" @if($contact->id == $lead->contact) selected @endif> {{$contact->first_name .' '. $contact->last_name}} </option>
                            @endforeach
                        </select>
                        @error('contacts') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                      
                      <!-- <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Status</label>
                        <select class="form-select" name="status" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled > select one status from provided </option>
                          <option value="Lost" @if($lead->status == "Lost") selected @endif >Lost  </option>
                          <option value="Cold" @if($lead->status == "Cold") selected @endif>Cold   </option>
                          <option value="Warm" @if($lead->status == "Warm") selected @endif>Warm   </option>
                          <option value="Lead" @if($lead->status == "Lead") selected @endif>Lead   </option>
                          <option value="Assigned"  @if($lead->status == "Assigned") selected @endif>Assigned  </option>
                        

                        </select>
                     </div> -->


                    
                        
                     <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Source</label>
                        <select class="form-select" name="source" id="myselect" onchange="getSourceValue()" aria-label="Default select example">
                        
                          <option value="Social Media"  @if($lead->status == "Social Media") selected @endif>Social Media   </option>
                          <option value="Email Marketing"  @if($lead->status == "Email Marketing") selected @endif>Email Marketing     </option>
                          <option value="Tele Marketing"  @if($lead->status == "Tele Marketing") selected @endif>Tele Marketing    </option>
                          <option value="Public Relations"  @if($lead->status == "Public Relations") selected @endif >Public Relations    </option>
                          <option value="Other"  @if($lead->status == "Other") selected @endif>Other   </option>
                        

                        </select>
                     </div>
                    
                     <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select One From Assigned Sales *</label>
                        <select class="form-select @error('sales') is-invalid @enderror"  name="sales_user" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>choose one of registered sales</option>
                           @foreach($sales as $sale)
                          <option value="{{$sale->id}}" @if($sale->id == $lead->sales_user) selected @endif >{{$sale->name}} </option>
                            @endforeach
                        </select>
                        @error('sales') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="mb-3" style="display:none" id="source_other">
                        <label for="exampleFormControlSelect1" class="form-label">Enter Lead Source *</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-address" class="input-group-text"><i class="bx bx-comment"></i></span>
                          <input type="text"  id="source_other_input" class="form-control phone-mask " placeholder="for ex : sales or any" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                        </div>
                      
                     </div>

                     
                    
                  </div> 
              
            
                  <div  >
                      <input type="submit"  class="btn btn-info btn-block " value="Assign Update"   @if($lead->request_status == "Accepted") disabled @endif/>  
</div>
            
             
              

                
              
              
               

          

      
  </form>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

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

<script>
flatpickr('#entrega',{
    dateFormat: "Y-m-d",
    defaultDate: ["{{ date('m-d-Y', strtotime($lead->closing_date)) }} "]
})
</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
  
@endsection
