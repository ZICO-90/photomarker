<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="/manage/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/manage/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/manage/dist/css/skins/_all-skins.min.css">

  </head>
  <body class="skin-blue sidebar-mini" dir="rtl">
        <!-- Main content -->
        <section class="content">  
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Example</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @if(Session::has('error'))
                     <div class="row mr-2 ml-2" >
                             <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                                     id="type-error">{{Session::get('error')}}
                             </button>
                     </div>
                @endif

                <form action="{{route('password.update')}}" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">
               
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control"  value="{{old('email')}}" name="email" id="exampleInputEmail1" placeholder="Enter email">
                      @error('email')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    
                        <div class="form-group">
                          <label for="password">new password</label>
                          <input type="text" class="form-control"   name="password" id="password" placeholder="Enter password">
                          @error('email')
                          <span class="text-danger">{{$password}}</span>
                          @enderror
                        </div>
                        
                            <div class="form-group">
                              <label for="confirmpassword">confirm password</label>
                              <input type="text" class="form-control"    name="password_confirmation" id="confirmpassword" placeholder="Enter confirm password">
                              @error('password_confirmation')
                              <span class="text-danger">{{$password}}</span>
                              @enderror
                            </div>
                  

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">shange password</button>
                  </div>
                </form>
              </div><!-- /.box -->

        </section><!-- /.content -->
    

     

  </body>
</html>

