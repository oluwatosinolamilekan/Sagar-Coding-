@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Developer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Developers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Developer Form</h3>
              </div>
              <!-- /.card-header -->
             <form action="{{ route('developer.update',$developer->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name" aria-describedby="exampleInputEmail1-error" aria-invalid="true" value="{{ $developer->first_name }}" required="">
                  <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email address</span></div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="exampleInputPassword1" placeholder="Enter Last Name" aria-describedby="exampleInputPassword1-error" value="{{ $developer->last_name }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" aria-describedby="exampleInputPassword1-error" value="{{ $developer->email }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" id="exampleInputPassword1" placeholder="Phone Number" aria-describedby="exampleInputPassword1-error" value="{{ $developer->phone_number }}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address" aria-describedby="exampleInputPassword1-error" value="{{ $developer->address }}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputPassword1"  aria-describedby="exampleInputPassword1-error">
                </div>
                   @if(!empty($developer->avater))
                      <span>Current Image: &nbsp;</span>
                          <img src="{{asset('devimages/'.$developer->avater)}}"  class="rounded shadow mr-2 mo-mb-2" width="50px">
                    @else
                        <span>No Image</span>
                      @endif
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
             </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
