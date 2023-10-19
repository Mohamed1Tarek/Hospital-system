<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
 @include('admin.css')
 <style type="text/css">
  .center{
   border-collapse: collapse;
   width: 80%;
   text-align: center;
   box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
   margin:auto;
   margin-top: 30px;
   border: 3px solid white;
  }
  .center td, .center th {
   border: 2px solid grey;
   padding: 10px;
   text-align: left;
 }

 .center th {
   background-color: burlywood; /* Adjust header background color as needed */
 }
 .h2font{
 
   font-size: 30px;
   padding-bottom: 20px;
   text-align: center;
  }
  .imag_size{
   width: 100px;
   height: 100px;
  }
  </style> 
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
    @include('admin.navbar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="div_center">
            
       @if (session()->has('message'))
           <div class="alert alert-success">
               <button type="button" class="close"data-dismiss="alert" aria-hidden="trur">x</button>
                 {{session()->get('message')}}
           </div>      
       @endif
        </div>
        <h2 class="h2font">Our Doctor</h2>
        <table class="center">
            <tr>
             <th>Doctor Name</th>
              <th>phone</th>
              <th>Speciality</th>
              <th>RoomNo</th>
              <th>Image</th>
              <th>Delete</th>
              <th>Update</th>
            </tr>
            @foreach ($data as $data)
              
            <tr>
              <td>{{$data->name}}</td>
              <td>{{$data->phone}}</td>
              <td>{{$data->speciality}}</td>
              <td>{{$data->room}}</td>
              <td><img width:"100px" height:"100px" src="DoctorImage/{{$data->image}}"></td>
              <td>
                <a onclick="return confirm('Are you sure to delete this')" 
                class="btn btn-danger" href="{{url('DeleteDoctor',$data->id)}}">Delete</a>
              </td>
              <td>
                <a  class="btn btn-primary" href="{{url('UpdateDoctor',$data->id)}}">Update</a>
              </td>
            </tr>
            @endforeach
          </table>
    </div>
</div>
@include('admin.script')
  </body>
</html>