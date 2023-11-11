@extends('layouts/contentNavbarLayout')

@section('title', ' Add New Lead')
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
<style type="text/css">
 
  </style>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
      rel="stylesheet"
    />
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Leads/</span> Add New Lead</h4>

<!-- Basic Layout -->
<div class="card container" style="width:80%"> 
  <form action="{{@route('lead.add')}}" method="POST" enctype="multipart/form-data">
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
                          <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                        
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Size (SAR) *</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-pound"></i></span>
                          <input type="number" name="size" min="0" id="basic-icon-default-company" class="form-control wb @error('size') is-invalid @enderror " placeholder="" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                        </div>
                        @error('size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

               <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Closing Date *  </label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text"><i class="bx bx-box"></i></span>
                          <input type="date" name="closing_date" id="basic-icon-default-email" class="form-control @error('closing_date') is-invalid @enderror" placeholder="" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                          <!-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>  -->
                        </div> 
                        @error('closing_date') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!-- <div class="form-text"> You can use letters, numbers & periods </div> -->
                      </div>

                    
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Clients *</label>
                        <select class="form-select @error('clients') is-invalid @enderror" onchange="getContactsFromClient()" id="clients_select"  name="client" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>choose one of registered clients</option>
                           @foreach($clients as $client)
                          <option value="{{$client->id}}">{{$client->name}} </option>
                            @endforeach
                        </select>
                        @error('clients') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="mb-3" style="" id="contact_div">
                        <label for="exampleFormControlSelect1" class="form-label">Contacts *</label>
                        <select class="form-select content_container @error('contacts') is-invalid @enderror " name="contact" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>choose one of registered CONTACTS</option>
                          @foreach($contacts as $contact)
                          <option value="{{$contact->id}}" >{{$contact->first_name . $contact->last_name}} </option>
                            @endforeach
                        </select>
                        @error('contacts') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                      
                      <!-- <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Status * </label>
                        <select class="form-select  @error('status') is-invalid @enderror " name="status" id="exampleFormControlSelect1"  aria-label="Default select example">
                          <option selected disabled > select one status from provided </option>
                          <option value="Lost">Lost  </option>
                          <option value="Cold">Cold   </option>
                          <option value="Warm" >Warm   </option>
                          <option value="Lead" >Lead   </option>
                          <option value="Assigned" >Assigned  </option>
                        

                        </select>
                        @error('status') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div> -->


                    
                        
                     <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Source </label>
                        <select class="form-select" name="source" id="myselect" onchange="getSourceValue()" aria-label="Default select example">
                        
                          <option value="Social Media">Social Media   </option>
                          <option value="Email Marketing">Email Marketing     </option>
                          <option value="Tele Marketing" >Tele Marketing    </option>
                          <option value="Public Relations" >Public Relations    </option>
                          <option value="Other" >Other   </option>
                        

                        </select>
                     </div>

                     <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select One From Assigned Sales *</label>
                        <select class="form-select @error('sales_user') is-invalid @enderror"  name="sales_user" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>choose one of registered sales</option>
                           @foreach($sales as $sale)
                          <option value="{{$sale->id}}">{{$sale->name}} </option>
                            @endforeach
                        </select>
                        @error('sales_user') 
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
                      <input type="submit"  class="btn btn-info btn-block " value="Assign New"/>  
</div>
            
             
              

                
              
              
               

          

      
  </form>

</div>


<script>


;
</script>
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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>

@endsection
