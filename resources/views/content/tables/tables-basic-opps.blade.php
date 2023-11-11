@extends('layouts/contentNavbarLayout')

@section('title', 'All Opportunities')
<script src="{{asset('assets/js/ui-toasts.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">



@section('content')

@if(auth()->user()->user_has_role->name == "Super-Admin" || auth()->user()->user_has_role->name == "Sales-Manager")
  @if($notification && $notification->user != auth()->user()->id)
  
<div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
  <div class="toast-header">
    <i class="bx bx-bell me-2"></i>
    <div class="me-auto fw-semibold">New Notification</div>
    <small>{{$notification->updated_at->diffForHumans()}}</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    {{$notification->action .' Date :'. date('Y-m-d H:i' ,strtotime($notification->updated_at) )}}
  </div>
</div>
@endif
@endif

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Opportunities /</span> All Opportunities
</h4>
<a class="btn btn-info " style=" float:right" href="{{route('opp.create')}}"> Create New</a><br><br>

<!-- Basic Bootstrap Table -->
<div class="card" >

  <h5 class="card-header">Opportunities Info</h5>
  <div class="table-responsive text-nowrap">
    <table class="table" id="example">
      <thead class="table-light">
        <tr>
          <th>#ID</th>
          <th>Name</th>
          <th>Size</th>
          <th>Statue</th>
          <th>Closing Date</th>
          <th>Source</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
    
        @foreach($opps_Assigns as $opp_Assign)
       
        <tr>
          <td>#{{$opp_Assign->opp->id}}</td>
          <td><a href ="{{url('/opp/view/'.$opp_Assign->opp->id)}}" style="font-family:bold; font-size:20px;    ">{{$opp_Assign->opp->name}} </a> 
          
         
        </td>
          <!-- <td>{{$opp_Assign->opp->has_owner->name}}</td> -->
          <td>{{$opp_Assign->opp->size}}</td>
          <td style="width:20%"> <div class="progress">
                 <div class="progress-bar progress-bar-striped progress-bar-animated @if($opp_Assign->opp->status == 'Closed Lost') bg-danger @else bg-success @endif " role="progressbar" style="width: {{$opp_Assign->opp->percentage}}" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">{{$opp_Assign->opp->percentage}} </div>
                
                </div>
                @if($opp_Assign->opp->status == "Qualify")
                  <span>(Pipeline)</span>
                  @elseif($opp_Assign->opp->status == "Develop")
                  <span>(Pipeline)</span>
                  @elseif($opp_Assign->opp->status == "Propose")
                  <span>(Pipeline)</span>
                  @elseif($opp_Assign->opp->status == "Negotiate")
                  (Committed)
                  @else 
                  ({{$opp_Assign->opp->status}})
                  @endif
          </td>
          <td>{{$opp_Assign->opp->closing_date}}</td>
          <td>{{$opp_Assign->opp->source}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" style="z-index:9999" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('/opp/edit/'.$opp_Assign->opp->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="{{url('/opp/delete/'.$opp_Assign->opp->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                <a class="dropdown-item" onclick="passOppId('{{$opp_Assign->opp->id}}')" href="#" data-bs-toggle="modal" data-bs-target="#modalCenter">
                <i class="bx bx-box me-1"></i>
            Re-Assign
</a>
              </div>
            </div>
          </td>
        </tr>

        @endforeach
     
      </tbody>
    </table>
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Opp Re-Assign To </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="re_assign_form">
                      @csrf
                <div class="modal-body">
                  <div class="row">
                  <div class="mb-3">
                   
                        <label for="exampleFormControlSelect1" class="form-label">Choose One From Selections To Re-Assign To *</label>
                        <select class="form-select @error('users') is-invalid @enderror" id="clients_select" required name="user"  id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected disabled>choose one of registered Reps / Managers</option>
                           @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->name}} </option>
                            @endforeach
                        </select>
                    
                     </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Re-Assign </button>
                </div>
                </form>
              </div>
            </div>
          </div>

        

         
</div>




<!--/ Responsive Table -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<script>

setTimeout(function(){
  $('.bs-toast').hide().fadeout();

}, 5000);

function passOppId(opp_id){
   $('#re_assign_form').attr('action' , "{{url('/opp/re_assign/')}}"+"/"+opp_id);
} 


  </script>

  <script>
  
    $('#example').DataTable();

  </script>
@endsection
