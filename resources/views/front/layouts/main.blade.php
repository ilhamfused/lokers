<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lokers</title>

    <link rel="stylesheet" href="/assets/css/main/app.css" />
    <link rel="shortcut icon" href="/assets/images/lokers/logo-only.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/lokers/logo-only.svg" type="image/png">

    <link rel="stylesheet" href="/assets/css/shared/iconly.css" />
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                @include('front.layouts.header')
                @include('front.layouts.navbar')
            </header>

            <div class="content-wrapper container">
                @yield('container')
            </div>

            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>
                                Crafted with
                                <span class="text-danger"><i class="bi bi-heart"></i></span>
                                by <a href="https://saugi.me">Saugi</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/pages/horizontal-layout.js"></script>

    <script src="/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/js/pages/dashboard.js"></script>
</body>

</html>
