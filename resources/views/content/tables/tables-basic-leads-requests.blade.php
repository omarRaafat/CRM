@extends('layouts/contentNavbarLayout')

@section('title', 'All Requests')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Leads /</span> All Leads Requests
</h4>

<!-- Basic Bootstrap Table -->
<div class="card" >

  <h5 class="card-header">Requests Info</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th>#ID</th>
          <th>Name</th>
          <th>Client</th>
          <th>Contact</th>
          <th>Created Date</th>
          <th>Source</th>
          <!-- <th>Status</th> -->
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($leads as $lead)
        <tr>
          <td>#{{$lead->id}}</td>
          <td><a href ="{{url('/lead/request/view/'.$lead->id)}}" style="font-family:bold; font-size:20px;    text-decoration: underline;">{{$lead->name}} </a></td>
          <td>{{$lead->has_client->name}}</td>
          <td>{{$lead->has_contact->first_name . $lead->has_contact->last_name}}</td>
          <td>{{date('Y-m-d' , strtotime($lead->created_at))}}</td>
          <td>{{$lead->source}}</td>
          <!-- <td>{{$lead->status}}</td> -->
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" style="z-index:9999" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('/lead/request/view/'.$lead->id)}}"><i class="bx bx-eye me-1"></i> View</a>
                <a class="dropdown-item" href="{{url('/lead/request/accept/'.$lead->id)}}"><i class="bx bx-check me-1"></i> Accept</a>
                <!-- <a class="dropdown-item" onclick="passOppId('{{$lead->id}}')" href="#" data-bs-toggle="modal" data-bs-target="#modalCenter">
                <i class="bx bx-box me-1"></i>
            Re-Assign
</a> -->
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
                  <h5 class="modal-title" id="modalCenterTitle">Lead Re-Assign To </h5>
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
 
</div><!--/ Responsive Table -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>

function passOppId(lead_id){
   $('#re_assign_form').attr('action' , '/lead/re_assign/'+lead_id);
} 
  </script>
@endsection
