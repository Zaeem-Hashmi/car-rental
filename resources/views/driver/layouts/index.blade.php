<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Urban-ride Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin-asset') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('admin-asset') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('admin-asset') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('admin-asset') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('admin-asset') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-asset') }}/js/select.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="{{ asset('admin-asset') }}/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin-asset') }}/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin-asset') }}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    {{-- <link rel="shortcut icon" href="{{ asset('admin-asset') }}/images/favicon.png" /> --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('') }}assets/img/taxi-logo.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    @yield('css')
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('driver.layouts.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            {{-- @include('admin.layouts.navbar') --}}
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('driver.layouts.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('driver.layouts.message')
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('driver.layouts.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('admin-asset') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin-asset') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('admin-asset') }}/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('admin-asset') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('admin-asset') }}/js/dataTables.select.min.js"></script>
    <script src="{{ asset('admin-asset') }}/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="{{ asset('admin-asset') }}/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin-asset') }}/js/off-canvas.js"></script>
    <script src="{{ asset('admin-asset') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('admin-asset') }}/js/template.js"></script>
    <script src="{{ asset('admin-asset') }}/js/settings.js"></script>
    <script src="{{ asset('admin-asset') }}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('admin-asset') }}/js/dashboard.js"></script>
    <script src="{{ asset('admin-asset') }}/js/Chart.roundedBarCharts.js"></script>
    <script src="{{ asset('admin-asset/js') }}/datatable/datatables.buttons.min.js"></script>
    <script src="{{ asset('admin-asset/js') }}/datatable/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('admin-asset/js') }}/datatable/jszip.min.js"></script>
    <script src="{{ asset('admin-asset/js') }}/datatable/pdfmake.min.js"></script>
    <script src="{{ asset('admin-asset/js') }}/datatable/vfs_fonts.js"></script>
    <script src="{{ asset('admin-asset/js') }}/datatable/buttons.html5.min.js"></script>
    <script src="{{ asset('admin-asset/js') }}/datatable/buttons.print.min.js"></script>
    <script>
        $("document").ready(function(){
            $(".nav-item").removeClass("active");
        })
    </script>
    <!-- End custom js for this page-->
    @yield('script')
</body>

</html>
