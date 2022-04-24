@include('layouts.admin.header')
@include('layouts.admin.sidebar')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>
@include('layouts.admin.footer')