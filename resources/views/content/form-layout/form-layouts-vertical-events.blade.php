@extends('layouts/contentNavbarLayout')

@section('title', ' Add New Event')
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
<style type="text/css">
 
  </style>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
      rel="stylesheet"
    />
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Leads/</span> Add New Event</h4>

<!-- Basic Layout -->
<div class="card container" style="width:80%"> 
  <form action="{{@route('event.add')}}" method="POST" enctype="multipart/form-data">
                @csrf 
      
        

            

               
                  
                  <div class="card-header d-flex justify-content-between align-items-center">
                
                    <h5 class="mb-0"></h5>
                
                    <small class="text-muted float-end"> * are required</small>
                  </div>
                  <div class="card-body">
                  
                      <div class="mb-3">
                        <label class="form-label " for="basic-icon-default-fullname"> Event Name *</label>
                        <div class="input-group input-group-merge ">
                          <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                          <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="test" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                        
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
                        <label class="form-label" for="basic-icon-default-email">Start Date *  </label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text"><i class="bx bx-box"></i></span>
                          <input type="date" name="start_date" id="basic-icon-default-email" class="form-control @error('start_date') is-invalid @enderror" placeholder="ORGANIZATION INDUSTRY" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                          <!-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>  -->
                        </div> 
                        @error('start_date') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!-- <div class="form-text"> You can use letters, numbers & periods </div> -->
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">End Date *  </label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text"><i class="bx bx-box"></i></span>
                          <input type="date" name="end_date" id="basic-icon-default-email" class="form-control @error('end_date') is-invalid @enderror" placeholder="ORGANIZATION INDUSTRY" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                          <!-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>  -->
                        </div> 
                        @error('end_date') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!-- <div class="form-text"> You can use letters, numbers & periods </div> -->
                      </div>

                      <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Slider Multiple Images Select</label>
                        <input class="form-control" type="file" name="images" id="formFileMultiple" multiple>
                      </div>
                    
                     
                    
                      
                      <div class="mb-3">
                        <label class="form-label " for="basic-icon-default-fullname"> Event Location *</label>
                        <div class="input-group input-group-merge ">
                          <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                          <input type="text"  name="location" class="form-control @error('location') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="test" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                        
                        </div>
                        @error('location')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label class="form-label " for="basic-icon-default-fullname"> Event City *</label>
                        <div class="input-group input-group-merge ">
                          <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                          <input type="text"  name="city" class="form-control @error('city') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="test" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                        
                        </div>
                        @error('city')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>


                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Event Badges </label>
                        <select class="form-select" name="badges" id="myselect"  aria-label="Default select example">
                        
                          <option value="1">YES   </option>
                          <option value="0">NO   </option>
                        

                        </select>
                     </div>

                     <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Event Session </label>
                        <select class="form-select" name="sessions" id="myselect"  aria-label="Default select example">
                        
                        <option value="1">YES   </option>
                          <option value="0">NO   </option>
                        

                        </select>
                     </div>

                     <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Landing Page </label>
                        <select class="form-select" name="landing_page" id="myselect"  aria-label="Default select example">
                        
                        <option value="1">YES   </option>
                          <option value="0">NO   </option>
                        

                        </select>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>

@endsection
