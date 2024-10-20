<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="template-resources/template-one/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"/> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"/>

    <!-- Libraries Stylesheet -->
    <link href="/template-resources/template-one/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/template-resources/template-one/css/style.css" rel="stylesheet"/>
</head>

<body>
    @include('sub-views.template-one.topbar')
   
    @section('main')
    @show

    <!-- Footer Start -->
    @include('sub-views.template-one.footer')
    <!-- Footer End -->

    @include('sub-views.template-one.back-to-top')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/template-resources/template-one/lib/easing/easing.min.js"></script>
    <script src="/template-resources/template-one/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/template-resources/template-one/mail/jqBootstrapValidation.min.js"></script>
    <script src="/template-resources/template-one/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/template-resources/template-one/js/main.js"></script>
</body>

</html>
