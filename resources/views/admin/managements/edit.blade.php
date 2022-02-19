@extends('admin.layouts-index')
@section('contents')
        <!-- Main content -->
        <section class="content">  
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">انشاء مدير</h3>
                </div><!-- /.box-header -->

                <!-- form start -->
                <form action="{{route('admin.managements.update' , $admin->id)}}" method="POST">
                  {{method_field('put')}} 
                  @csrf
                  <div class="box-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">name</label>
                        <input type="text" class="form-control"  value="{{$admin->name}}" name="name" id="exampleInputEmail1" placeholder="Enter email">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control"  value="{{$admin->email}}" name="email" id="exampleInputEmail1" placeholder="Enter email">
                      @error('email')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">old password</label>
                      <input type="text" name="password_old" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      @error('password_old')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                 
                    <div class="form-group">
                        <label for="confirmpassword">new password</label>
                        <input type="text" class="form-control"    name="password" id="confirmpassword" placeholder="Enter confirm password">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="confirmpassword">confirm password</label>
                        <input type="text" class="form-control"    name="password_confirmation" id="confirmpassword" placeholder="Enter confirm password">
                        @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                  

                      <div class="form-group">
                        <label for="exampleInputEmail1">job Title</label>
                        <input type="text" class="form-control"  value="{{$admin->console}}" name="console" id="exampleInputEmail1" placeholder="Enter email">
                        @error('console')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

        </section><!-- /.content -->
@endsection