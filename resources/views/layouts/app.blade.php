<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css') }}">

    <style>
    .main-content {
        margin-left: 270px !important;
    }

    /* .content-inner{
    padding-left: 20px !important;
} */

    .navbar-inner {
        background: #ffffff !important;
    }

    .sidebar {
        position: fixed;
        top: 12px;
        left: 17px;
        font-size: 16px;
        width: 271px !important;
        max-width: 420px !important;

        height: calc(100vh - 24px);
        box-shadow:
            0 12px 30px rgba(0, 0, 0, .06);
        border-radius: 24px;
    }

    html {
        font-size: 16px;
    }

    body {
        font-size: 18px;

    }

    .content-inner {
        background:
            linear-gradient(135deg,
                #edf4ff,
                #f8fbff) !important;
    }

    .content-inner {
        position: relative;
    }

    .content-inner::before {
        content: '';
        position: fixed;

        top: -150px;
        right: -150px;

        width: 400px;
        height: 400px;

        border-radius: 50%;

        background: rgba(58, 87, 232, .12);

        filter: blur(120px);

        pointer-events: none;
    }


    .btn-detail {
        background: #eef2ff;
        color: #3a57e8;
        border: none;
    }

    .btn-detail:hover {
        background: #dfe6ff;
        color: #3a57e8;
    }

    .btn-edit {
        background: #fff4e5;
        color: #d97706;
        border: none;
    }

    .btn-edit:hover {
        background: #ffe8c2;
        color: #d97706;
        transform: translateY(-2px);
    }

    .btn-delete {
        background: #fee2e2;
        color: #dc2626;
        border: none;
    }

    .btn-delete:hover {
        background: #fecaca;
        color: #dc2626;
    }


    .action-btn:hover {
        transform: translateY(-2px);
    }



    /* .iq-main-menu .nav-link {
        margin: 6px 14px;
        padding: 13px 18px;

        border-radius: 16px;

        transition: .25s;

        font-weight: 600;
    } */
    .iq-navbar-header {
        min-height: 100px;
        background: rgba(255, 255, 255, .5);
        border-radius: 18px;
        margin-left: 50px;
        padding: 25px 24px;


        margin-bottom: 20px;
    }

    .sidebar-title {
        display: block;
        padding: 10px 20px;
        letter-spacing: 1px;
        color: #adb5bd;
        cursor: default;

    }


    .iq-main-menu .nav-link {

        border-radius: 16px;

        transition: .25s;

        font-weight: 600;
    }

    .iq-main-menu .nav-link:hover {
        background: #f4f7fe;

        transform: translateX(3px);
    }

    .iq-main-menu .nav-link.active {
        background: linear-gradient(135deg,
                #3a57e8,
                #5f7cff);

        color: #fff !important;

        box-shadow:
            0 8px 20px rgba(58, 87, 232, .25);
    }



    .sidebar-header {
        font-size: 20px;
        padding: 20px 10px 30px;
    }

    /* .sidebar{
     width:300px;

    height:calc(100vh - 24px);

    box-shadow:
        0 12px 30px rgba(0,0,0,.06);

    overflow:visible;
} */



    .avatar-50 {
        width: 50px;
        height: 50px;

        font-size: 18px;
        font-weight: 700;
    }

    .btn {
        border-radius: 12px;
        font-weight: 600;
    }

    .page-card {
        border: none;
        border-radius: 18px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, .06);
    }

    .page-card .card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #eef2f7;
    }

    .page-card .card-body {
        padding: 24px;
    }


    .table thead th {
        text-transform: uppercase;
        font-size: 10;
        color: #6c757d;
        border-bottom: 1px solid #eef1f4;
    }

    .table tbody tr:hover {
        background: #f8faff;
    }

    .hero-dashboard {
        position: relative;
        overflow: hidden;

        /* border-radius:24px; */

        background: linear-gradient(135deg,
                #3a57e8,
                #607dff);

        box-shadow:
            0 15px 35px rgba(58, 87, 232, .25);
    }

    .hero-dashboard::before {
        content: '';
        position: absolute;

        width: 250px;
        height: 250px;

        right: -80px;
        top: -80px;

        border-radius: 50%;

        background: rgba(255, 255, 255, .08);
    }

    .hero-dashboard::after {
        content: '';

        position: absolute;

        width: 180px;
        height: 180px;

        right: 120px;
        bottom: -90px;

        border-radius: 50%;

        background: rgba(255, 255, 255, .05);
    }

    .hero-icon {
        font-size: 110px;
        color: rgba(255, 255, 255, .12);
    }

    body {
        background:
            linear-gradient(135deg,
                #eef2ff,
                #f8fafc,
                #eef6ff);
        font-weight: 500;
    }

    .trx-item {
        padding: 12px;
        border-radius: 14px;

        transition: .25s;
    }

    .trx-item:hover {
        background: #f8f9fc;
    }

    .static-item .nav-link {
        font-size: .85rem;
        font-weight: 700;

        letter-spacing: 1px;

        color: #adb5bd;
    }


    .chart-card {
        border: none;

        border-radius: 20px;

        box-shadow:
            0 8px 24px rgba(0, 0, 0, .06);
    }

    .navbar-inner {
        min-height: 70px;
    }

    .avatar-50 {
        width: 50px;
        height: 50px;

        font-size: 18px;
        font-weight: 700;
    }




    /* ======================
   GLOBAL CARD
====================== */

    .card {
        background: #fff;
        box-shadow:
            0 8px 24px rgba(0, 0, 0, .06);


        backdrop-filter: blur(10px);

        border: 1px solid rgba(255, 255, 255, .5);
        border: none;
        border-radius: 18px !important;
        backdrop-filter: blur(10px);
    }

    /* ======================
   HERO DASHBOARD
====================== */

    .hero-dashboard {
        position: relative;
        overflow: hidden;

        /* border-radius:24px; */

        background: linear-gradient(135deg,
                #3a57e8 0%,
                #607dff 100%);

        box-shadow:
            0 10px 35px rgba(58, 87, 232, .25);
    }

    .hero-dashboard h2 {
        color: #fff;
    }

    .hero-dashboard p {
        color: rgba(255, 255, 255, .85);
    }

    .hero-dashboard::before {
        content: '';

        position: absolute;

        width: 250px;
        height: 250px;

        border-radius: 50%;
        background:
            linear-gradient(135deg,
                #3a57e8,
                #5974ff,
                #6f89ff);

        background: rgba(255, 255, 255, .08);

        right: -80px;
        top: -80px;
        filter: blur(10px);
    }

    .hero-dashboard::after {
        content: '';

        position: absolute;

        width: 180px;
        height: 180px;

        border-radius: 50%;

        background: rgba(255, 255, 255, .05);

        right: 120px;
        bottom: -90px;
        filter: blur(5px);
    }

    .hero-icon {
        font-size: 120px;
        color: rgba(255, 255, 255, .12);
    }

    .hero-badge {
        background: rgba(255, 255, 255, .15);
        color: #fff;

        padding: 6px 14px;

        border-radius: 999px;

        font-size: .8rem;
    }

    /* ======================
   STATISTIC CARD
====================== */

    .stock-card {
        border: none;

        border-radius: 20px;

        box-shadow:
            0 8px 24px rgba(0, 0, 0, .06);
    }


    .stat-card {
        background: rgba(255, 255, 255, .9);

        backdrop-filter: blur(10px);

        border: none;

        border-radius: 20px;

        box-shadow:
            0 8px 24px rgba(0, 0, 0, .08);

        transition: .25s;
    }

    .stat-card:hover {
        transform: translateY(-6px);
    }

    .stat-icon {
        width: 60px;
        height: 60px;

        border-radius: 16px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 24px;
    }

    /* ======================
   TRANSAKSI TERBARU
====================== */

    .trx-icon {
        width: 48px;
        height: 48px;

        border-radius: 14px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 18px;

    }

    .bg-primary-subtle {
        background: #edf2ff;
    }

    .bg-success-subtle {
        background: #eafaf1;
    }

    .bg-warning-subtle {
        background: #fff8e8;
    }

    .bg-danger-subtle {
        background: #ffecec;
    }

    .table .badge {
        font-size: 15px;
        font-weight: 700;
    }
    </style>


</head>

<body>
    @include('layouts.sidebar')

    <main class="main-content">

        @include('layouts.navbar')

        @if(isset($pageTitle))

        <div class="container-fluid content-inner pb-0">

            <div class="card hero-dashboard border-0 mb-4">

                <div class="card-body p-4">

                    <div class="row align-items-center">

                        <div class="col-md-8">

                            <h2 class="fw-bold text-white mb-2">
                                {{ $pageTitle }}
                            </h2>

                            <p class="text-white-50 mb-0">
                                {{ $pageDescription }}
                            </p>

                        </div>

                        <div class="col-md-4 text-end">

                            <i class="{{ $pageIcon }} hero-icon"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @endif
        <div class="container-fluid content-inner py-0">
            @yield('content')
        </div>

    </main>

    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>
    <script src="{{ asset('assets/js/charts/widgetcharts.js') }}"></script>
    <script src="{{ asset('assets/js/charts/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/fslightbox.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/setting.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/form-wizard.js') }}"></script>
    <script src="{{ asset('assets/js/hope-ui.js') }}"></script>
    @stack('scripts')

</body>

</html>