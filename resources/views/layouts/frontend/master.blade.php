@include('layouts.frontend.header')
@include('layouts.frontend.topbar')
@include('layouts.frontend.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
@include('layouts.frontend.footer')