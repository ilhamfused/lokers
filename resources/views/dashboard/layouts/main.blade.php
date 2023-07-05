<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css">
    <link rel="stylesheet" href="/assets/css/main/app.css">
    <link rel="stylesheet" href="/assets/css/main/app-dark.css">
    <link rel="stylesheet" href="/assets/extensions/sweetalert2/sweetalert2.min.css">
    <link rel="shortcut icon" href="/assets/images/lokers/logo-only.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/lokers/logo-only.svg" type="image/png">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
</head>

<body>
    <div id="app">
        @include('dashboard.layouts.sidebar')
        <div id="main" class='layout-navbar'>
            @include('dashboard.layouts.header')
            @yield('container')
        </div>
    </div>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
    <script src="/assets/js/pages/form-element-select.js"></script>
    <script src="/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="/assets/js/myswal.js"></script>
    <script src="/assets/js/myscript.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
</body>

</html>
