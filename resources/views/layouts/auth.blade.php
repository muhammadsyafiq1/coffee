@include('includes.styles')
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        {{-- <img class="align-content" src="/backend/images/logo.png" alt=""> --}}
                    </a>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    @include('includes.scripts')
</body>