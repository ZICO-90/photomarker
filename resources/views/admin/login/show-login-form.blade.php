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

       
            
            @if(Session::has('status'))
                <div class="row mr-2 ml-2">
                        <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                                id="type-error">{{Session::get('status')}}
                        </button>
                </div>
            @endif
                <!-- form start -->
                <form action="{{route('admin.join')}}" method="POST">
                    @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control"  value="{{old('email')}}" name="email" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                  
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"  value="{{old('remember')}}" name="remember"> remember
                      </label>
                    </div>
                  </div><!-- /.box-body -->
                  <a href="{{route('admin.password.email')}}">
                   forgot password
                  </a>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

        </section><!-- /.content -->
    

     

  </body>
</html>

