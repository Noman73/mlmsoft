@include('layouts.admin.header')
@include('layouts.admin.topbar')
@include('layouts.admin.sidebar')
<div class="content-body">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
@include('layouts.admin.footer')