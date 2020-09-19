<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>togethergloballyup &amp; Merry-go-round company</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('layouts.auth/googleTag')

    <!-- Favicon -->
    <link rel="icon" href="/assets/img/logo/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/assets/style.css">

</head>
@include('includes.messages')

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MHWCZ2L" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    @include('includes.header')
    @yield('content')

    {{-- end of content --}}
    <!-- ##### Newsletter Area Start ###### -->
    @include('includes.newsletter')
    <!-- ##### Newsletter Area End ###### -->

    <!-- ##### Footer Area Start ##### -->
    @include('includes.footer')
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="/assets/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="/assets/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="/assets/js/active.js"></script>
    @yield('scripts')

</body>

</html>
