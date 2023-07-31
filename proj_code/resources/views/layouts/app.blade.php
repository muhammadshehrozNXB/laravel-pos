<!doctype html>
<html class="no-js" lang="en">
@include('admin.partials.source-head')
<body>
<!-- Start Welcome area -->
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    @include('admin.partials.header')
    @yield('content')
    @include('admin.partials.footer')
</div>
@include('admin.partials.source-footer')
</body>
</html>
