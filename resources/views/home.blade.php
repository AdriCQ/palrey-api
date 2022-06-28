<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('gui/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('gui/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('gui/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gui/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gui/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gui/vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('gui/vendors/owl-carousel/owl.carousel.min.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('gui/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('gui/css/responsive.css') }}">
</head>
<body>
    <div id="app">
        <h1>Default Vue app</h1>
        <index-page />
    </div>

    <script src="{{ mix('js/app.js') }}"></script>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('gui/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('gui/js/popper.js') }}"></script>
    <script src="{{ asset('gui/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('gui/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('gui/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('gui/js/mail-script.js') }}"></script>
    <script src="{{ asset('gui/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('gui/vendors/nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('gui/js/mail-script.js') }}"></script>
    <script src="{{ asset('gui/js/stellar.js') }}"></script>
    <script src="{{ asset('gui/vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('gui/js/custom.js') }}"></script>
</body>
</html>
