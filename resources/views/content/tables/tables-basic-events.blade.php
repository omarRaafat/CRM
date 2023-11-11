@extends('layouts/contentNavbarLayout')

@section('title', 'All Events')
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
  <span class="text-muted fw-light">Events /</span> All Events
</h4>

<!-- Basic Bootstrap Table -->
<div class="card" >

  <h5 class="card-header">Events Info</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th>#ID</th>
          <th>Name</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>City</th>
          <th>Location</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($events as $event)
        <tr>
          <td>#{{$event->id}}</td>
          <td><a href ="{{url('/event/edit/'.$event->id)}}" style="font-family:bold; font-size:20px;    text-decoration: underline;">{{$event->name}} </a></td>
        
          <td>{{$event->start_date}}</td>
          <td>{{$event->end_date}}</td>
          <td>{{$event->city}}</td>
          <td>{{$event->location}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" style="z-index:9999" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('/event/edit/'.$event->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="{{url('/event/delete/'.$event->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
      
              </div>
            </div>
          </td>
        </tr>

        @endforeach
     
      </tbody>
    </table>

           
       
</div>
 
</div><!--/ Responsive Table -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


@endsection
