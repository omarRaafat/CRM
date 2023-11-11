@extends('layouts/contentNavbarLayout')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">


@section('title', 'All Leads')
<style>

 .Accepted{
   color:green
 }

 .Rejected{
   color:red
 }


 .Pending{
   color:gray
 }

</style>
@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Leads /</span> All Leads
</h4>

<!-- Basic Bootstrap Table -->
<div class="card" >

  <h5 class="card-header">Leads Info</h5>
  <div class="table-responsive text-nowrap">
    <table class="table" id="example">
      <thead class="table-light">
        <tr>
          <th>#ID</th>
          <th>Name</th>
          <th>Client</th>
          <th>Contact</th>
          <th>Created Date</th>
          <th>Source</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($leads_assigns as $leads_assign)
        <tr>
          <td>#{{$leads_assign->lead->id}}</td>
          <td><a href ="{{url('/lead/view/'.$leads_assign->lead->id)}}" style="font-family:bold; font-size:20px;    text-decoration: underline;">{{$leads_assign->lead->name}} </a></td>
          <td>{{$leads_assign->lead->has_client->name}}</td>
          <td>{{$leads_assign->lead->has_contact->first_name}}</td>
          <td>{{date('Y-m-d' , strtotime($leads_assign->lead->created_at))}}</td>
          <td>{{$leads_assign->lead->source}}</td>
          <td class="{{$leads_assign->lead->request_status}}">{{$leads_assign->lead->request_status}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" style="z-index:9999" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                @if($leads_assign->lead->request_status != "Accepted")
                <a class="dropdown-item" href="{{url('/lead/edit/'.$leads_assign->lead->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                @endif
                <a class="dropdown-item" href="{{url('/lead/delete/'.$leads_assign->lead->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                @if($leads_assign->lead->request_status != "Accepted")
                <a class="dropdown-item" onclick="passOppId('{{$leads_assign->lead->id}}')" href="#" data-bs-toggle="modal" data-bs-target="#modalCenter">
                <i class="bx bx-box me-1"></i>
            Re-Assign
</a>
@endif
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<script>
  
    $('#example').DataTable();

  </script>
<script>

function passOppId(lead_id){
   $('#re_assign_form').attr('action' , "{{url('/lead/re_assign/')}}"+"/"+lead_id);
} 
  </script>
@endsection
