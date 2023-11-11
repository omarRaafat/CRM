@extends('layouts/contentNavbarLayout')

@section('title', ' Update Event')
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
<style type="text/css">
 
  </style>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
      rel="stylesheet"
    />
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Events/</span> Update Event</h4>

<!-- Basic Layout -->
  <form action="{{@route('event.edit',$event->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="card">
                <div class="row">
                 
                    <div class=" col-md-6"> 

                            

                                

                                  
                                      
                                      <div class="card-header d-flex justify-content-between align-items-center">
                                    
                                        <h5 class="mb-0"></h5>
                                    
                                        <small class="text-muted float-end"> * are required</small>
                                      </div>
                                      <div class="card-body">
                                      
                                          <div class="mb-3">
                                            <label class="form-label " for="basic-icon-default-fullname"> Event Name *</label>
                                            <div class="input-group input-group-merge ">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                              <input type="text"  name="name" value="{{$event->name}}" class="form-control @error('name') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="test" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                            
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                          </div>

                                          <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$event->name}}</textarea>
                                          </div>

                                        

                                          <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-email">Start Date *  </label>
                                            <div class="input-group input-group-merge">
                                              <span class="input-group-text"><i class="bx bx-box"></i></span>
                                              <input type="date" name="start_date" id="basic-icon-default-email" value="{{$event->start_date}}" class="form-control @error('start_date') is-invalid @enderror" placeholder="ORGANIZATION INDUSTRY" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
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
                                              <input type="date" name="end_date" id="basic-icon-default-email" value="{{$event->end_date}}" class="form-control @error('end_date') is-invalid @enderror" placeholder="ORGANIZATION INDUSTRY" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                                              <!-- <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>  -->
                                            </div> 
                                            @error('end_date') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <!-- <div class="form-text"> You can use letters, numbers & periods </div> -->
                                          </div>

                                        
                                          
                                          <div class="mb-3">
                                            <label class="form-label " for="basic-icon-default-fullname"> Event Location *</label>
                                            <div class="input-group input-group-merge ">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                              <input type="text"  name="location" value="{{$event->location}}" class="form-control @error('location') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="test" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                            
                                            </div>
                                            @error('location')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                          </div>

                                          <div class="mb-3">
                                            <label class="form-label " for="basic-icon-default-fullname"> Event City *</label>
                                            <div class="input-group input-group-merge ">
                                              <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                              <input type="text"  name="city" value="{{$event->city}}" class="form-control @error('city') is-invalid @enderror " id="basic-icon-default-fullname" placeholder="test" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                            
                                            </div>
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                          </div>


                                        

                                      

                                        
                                            
                                        

                                        
                                      
                                      </div> 
                                  
                                
                                

                    </div>

                    <div class=" col-md-6"> 

                            

                                

                                  
                                      
                                      <div class="card-header d-flex justify-content-between align-items-center">
                                    
                                        <h5 class="mb-0"></h5>
                                    
                                        <small class="text-muted float-end"> * are required</small>
                                      </div>
                                      <div class="card-body">
                                      
                                        

                                      
                                        

                                        

                                          <div class="mb-3">
                        <h5 class="my-4">Event Slider Images</h5>

                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" >
                          <ol class="carousel-indicators">
                        
                            @foreach(json_decode($event->images) as $key=>$image)
                            <li data-bs-target="#carouselExample" data-bs-slide-to="{{$key}}" class="@if($key == 0) active @endif"></li>

                            @endforeach
                          </ol>
                          <div class="carousel-inner">

                            @foreach(json_decode($event->images) as $key=>$image)
                            <div class="carousel-item @if($key == 0)active @endif">
                              <img class="d-block w-100" style="height:250px" src="{{url($image)}}" alt="First slide" />
                            
                            </div>
                            @endforeach
                          
                          </div>
                          <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </a>
                        </div>
                      </div>

                                          <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Update Slider Images </label>
                                            <input class="form-control" type="file" name="images[]" id="formFileMultiple" multiple>
                                          </div>
                                        
                                        

                    
                                          <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Event Badges </label>
                                            <div class="form-check form-switch mb-2">
                                              <input class="form-check-input" type="checkbox" name="badges" value="1"   id="flexSwitchCheckDefault" @if($event->badges) checked @endif>
                                              <label class="form-check-label" for="flexSwitchCheckDefault">YES / NO</label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Event Session </label>
                                            <div class="form-check form-switch mb-2"> 
                                              <input class="form-check-input" type="checkbox" name="sessions" value="1"  id="flexSwitchCheckDefault2" @if($event->sessions) checked @endif>
                                              <label class="form-check-label" for="flexSwitchCheckDefault2">YES / NO</label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Landing Page </label>
                                            <div class="form-check form-switch mb-2">
                                              <input class="form-check-input" type="checkbox" name="landing_page" value="1"   id="flexSwitchCheckDefault3" @if($event->landing_page) checked @endif>
                                              <label class="form-check-label" for="flexSwitchCheckDefault3">YES / NO</label>
                                            </div>
                                        </div>
                                            
                                        

                                        
                                      
                                      </div> 
                                  
                                
                                

                    </div>

                      <div class="col-xxl">
                      <hr>
                        <div class="mb-4">
                          <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Basic with Icons</h5> <small class="text-muted float-end">Merged input group</small>
                          </div>
                          <div class="card-body">
                            <form>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                                <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Company</label>
                                <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input type="text" id="basic-icon-default-company" class="form-control" placeholder="ACME Inc." aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                                <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="text" id="basic-icon-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                                    <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                                  </div>
                                  <div class="form-text"> You can use letters, numbers & periods </div>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone No</label>
                                <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                    <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-message">Message</label>
                                <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                    <textarea id="basic-icon-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="row justify-content-end">
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                     </div>
                </div>
              
            <div class="text-center">
               <input type="submit"  class="btn btn-info " value="Assign New"/>  
             </div>

                </div>

                
       
            
            
      
  </form>

<script>


;
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>

@endsection
