<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('assets/admin/images/favicon.ico')}}">
    @stack('styles')
    <title>@yield('title')</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('assets/admin/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/css/skin_color.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('assets/admin/assets/vendor_components/sweetalert/sweetalert.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('assets/admin/assets/vendor_components/toastr/toastr.min.css')}}">
  @stack('styles')
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  @include('admin.partials.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
      <section class="content">
        @yield('content')
      </section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  @include('admin.partials.footer')

  <!-- Control Sidebar -->
  @include('admin.partials.control-sidebar')
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
  <script src="{{asset('assets/admin/js/vendors.min.js')}}"></script>
	@stack('scripts')
	<!-- Sunny Admin App -->
	<script src="{{asset('assets/admin/js/template.js')}}"></script>
	<script src="{{asset('assets/admin/js/pages/dashboard.js')}}"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Toaster -->
    <script src="{{asset('assets/admin/assets/vendor_components/toastr/toastr.min.js')}}"></script>
  <script>
    const errors = @json($errors->all()) ?? []
    const successMessage = "{{Session::get('success')}}" ?? ''
    for(let error of errors){
      toastr.error(error)
    }
    if (successMessage){
      toastr.success(successMessage)
    }
  </script>
  @stack('scripts')
</body>
</html>
