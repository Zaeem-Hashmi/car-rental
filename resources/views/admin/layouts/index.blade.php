<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
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
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin-asset') }}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin-asset') }}/images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    @yield('css')
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.layouts.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            {{-- @include('admin.layouts.navbar') --}}
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('admin.layouts.navbar-settings')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.layouts.footer')
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
    <!-- End custom js for this page-->
    @yield('script')
</body>

</html>
