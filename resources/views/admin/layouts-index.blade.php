<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

@include('admin.includse.head-link')
@yield('css')
@yield('js')
   
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

    
      @include('admin.includse.layouts.header')   <!--  includse header  -->

      @include('admin.includse.layouts.main-sidebar')  <!-- Left side column. contains the logo and sidebar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            پیشخوان
            <small>پنل مدیریت</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li class="active">پیشخوان</li>
          </ol>
        </section>

        @yield('contents')

       
      </div>
      <!-- /.content-wrapper -->



       <!-- main-footer  -->
       @include('admin.includse.layouts.footer') 
       <!-- /.main-footer -->


      <!-- Control Sidebar -->
      @include('admin.includse.layouts.control-sidebar') 
      <!-- /.control-sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    @include('admin.includse.js-srctipt') 
  
  </body>
</html>
