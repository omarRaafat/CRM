@extends('layouts/contentNavbarLayout')

@section('title', 'All Contacts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">


@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Contacts /</span> All Contacts
</h4>
<form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data" style="float:right" >
            @csrf
<div class="form-group mb-4" > 
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.ods" required>
                    <label class="custom-file-label" for="customFile">Select CSV File</label>
                </div>
            </div>
            <button class="btn btn-primary btn-block">Import Contacts</button>
</form><br><br><br><br><br>

<!-- Basic Bootstrap Table -->
<div class="card">
<div class="card">
  <h5 class="card-header">Contacts Basic Info</h5>
  <div class="table-responsive text-nowrap">
    <table class="table" id="example">
      <thead class="table-light">
        <tr>
          <th>#ID</th>
          <th>Prefix</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Client Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($contacts as $contact)
        <tr>
          <td>#{{$contact->id}}</td>
          <td>{{$contact->prefix}}</td>
          <td><a href ="{{url('/contact/view/'.$contact->id)}}" style="font-family:bold; font-size:20px;    ">{{$contact->first_name}} </a> </td>
          <td>{{$contact->last_name}}</td>
          <td>{{$contact->email}}</td>
          <td>{{$contact->client->name}}</td>
        
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('/contact/edit/'.$contact->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="{{url('/contact/delete/'.$contact->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>

        @endforeach
     
      </tbody>
    </table>
  </div>
</div><!--/ Responsive Table -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<script>
  
    $('#example').DataTable();

  </script>
@endsection
