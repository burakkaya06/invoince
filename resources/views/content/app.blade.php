@include('content.header')

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    @include('content.topbar')
    @include('content.leftsidebar')
    <div class="main-content">
        @yield('content')
    </div>
    @include('content.footer')

</div>

</body>
