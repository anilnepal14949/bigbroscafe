@include('admin.layouts.header')
<div id="wrapper">
    @include('admin.layouts.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div id="app">
                @include('admin.layouts.navbar')
                <router-view></router-view>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
