<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">
    <title>Easy School Management System - Dashboard</title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
    <!-- Style-->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        <!-- HEADER -->
        @include('admin.body.header')
        <!-- HEADER -->
        <!-- SIDEBAR -->
        @include('admin.body.sidebar')
        <!-- SIDEBAR -->
        <!-- MAIN -->
        @yield('admin')
        <!-- MAIN -->
        <!-- FOOTER -->
        @include('admin.body.footer')
        <!-- FOOTER -->
        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- Vendor JS -->
    <script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
    <!-- Tables -->
    <script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('backend/js/pages/data-table.js')}}"></script>
    <!-- Sunny Admin App -->
    <script src="{{asset('backend/js/template.js')}}"></script>
    <script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: '<span style="color: black;">Are you sure?</span>',
                    text: "Delete This Data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete It!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                    }
                })
            });
        });
    </script>
    <!-- Toastr -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if(Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type','info') }}";
        switch (type) {
            case 'info':
                toastr.info("{!! Session::get('message') !!}");
                break;
            case 'success':
                toastr.success("{!! Session::get('message') !!}");
                break;
            case 'warning':
                toastr.warning("{!! Session::get('message') !!}");
                break;
            case 'error':
                toastr.error("{!! Session::get('message') !!}");
                break;
        }
    </script>
    @endif
</body>

</html>