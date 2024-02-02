<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Job Dating</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    @vite(['resources/css/style.min.css', 'resources/js/app.js'])
</head>

<body>
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            @include('layouts.header')
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            @include('layouts.aside')
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Announcements</h3>
                            <a href="{{ url('announcements/create') }}" class="text-muted">Add Announcement</a>
                            <div class="table-responsive">
                                @yield('announcements')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>