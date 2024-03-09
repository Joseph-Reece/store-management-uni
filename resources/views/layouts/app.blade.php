<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Store Manager is a Powerful Inventory Management tool built for Universities">
    <meta name="keywords"
        content="Store manager, Muranga University, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="GOODWORKS">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/logo/logos.png">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/app-assets/fonts/material-icons/material-icons.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/material-vendors.min.css">

    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/selects/select2.min.css">

    {{--  <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/file-uploaders/dropzone.min.css">  --}}
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/icheck/icheck.css">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/material.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/material-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/material-colors.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/material-vertical-menu.css">
    {{--  <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/file-uploaders/dropzone.css">  --}}
    {{--  <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/dropzone.css">  --}}
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/hospital.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/pickers/daterange/daterange.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-chat.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/ecommerce-cart.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/travel.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/ecommerce-shop.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/checkboxes-radios.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-callout.css">


    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('layouts.navbar')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    @include('layouts.sidenav')

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->

    @include('layouts.footer')
    <!-- END: Footer-->

    @yield('scripts')

    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/material-vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"></script>
    <script src="/app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>


    <script src="/app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>

    <script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/app-assets/vendors/js/tables/buttons.flash.min.js"></script>
    <script src="/app-assets/vendors/js/tables/jszip.min.js"></script>
    <script src="/app-assets/vendors/js/tables/pdfmake.min.js"></script>
    <script src="/app-assets/vendors/js/tables/vfs_fonts.js"></script>
    <script src="/app-assets/vendors/js/tables/buttons.html5.min.js"></script>
    <script src="/app-assets/vendors/js/tables/buttons.print.min.js"></script>

    <script src="/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>



    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/pages/material-app.js"></script>
    <script src="/app-assets/js/scripts/forms/wizard-steps.js"></script>
    <script src="/app-assets/js/scripts/pages/appointment.js"></script>
    <script src="/app-assets/js/scripts/tables/datatables/datatable-advanced.js"></script>
    <script src="/app-assets/js/scripts/forms/form-repeater.js"></script>
    <script src="/app-assets/js/scripts/extensions/toastr.js"></script>
    <script src="/app-assets/js/scripts/pages/ecommerce-cart.js"></script>
    <script src="/app-assets/vendors/js/ui/prism.min.js"></script>
    <script src="/app-assets/js/scripts/pages/app-chat.js"></script>




    <script src="/app-assets/js/scripts/forms/select/form-select2.js"></script>


    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}", 'INFO', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });

                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}", 'WARNING', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });

                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}", 'SUCCESS', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });

                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}", 'OOPS!', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });

                    break;
            }
        @endif
    </script>
    <!-- END: Page JS-->


</body>
<!-- END: Body-->

</html>
