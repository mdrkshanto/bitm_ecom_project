@include('admin.master.includes.head.index')
<!-- ======= Header ======= -->
@include('admin.master.includes.header.index')
<!-- ======= Sidebar ======= -->
@include('admin.master.includes.sidebar.index')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>@yield('title')</h1>
    </div><!-- End Page Title -->
    @yield('body')

</main><!-- End #main -->
@include('admin.master.includes.foot.index')
