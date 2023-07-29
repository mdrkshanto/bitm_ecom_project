<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link{{request()->segment(1) === 'dashboard' ? ' active' : null}}" href="{{route('dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="">
            <a class="nav-link{{request()->segment(1) === 'category' ? ' active' : null}}" href="{{route('category.index')}}">
                <i class="bi bi-menu-button-wide"></i><span>Category</span>
            </a>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link{{request()->segment(1) === 'subcategory' ? ' active' : null}}" href="{{route('subcategory.index')}}">
                <i class="bi bi-journal-text"></i><span>Subcategory</span>
            </a>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link{{request()->segment(1) === 'brand' ? ' active' : null}}" href="{{route('brand.index')}}">
                <i class="bi bi-layout-text-window-reverse"></i><span>Brand</span>
            </a>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link{{request()->segment(1) === 'unit' ? ' active' : null}}" href="{{route('unit.index')}}">
                <i class="bi bi-bar-chart"></i><span>Unit</span>
            </a>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link{{request()->segment(1) === 'product' ? ' active' : null}}" href="{{route('product.index')}}">
                <i class="bi bi-gem"></i><span>Product</span>
            </a>
        </li><!-- End Icons Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Orders</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Customers</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Users</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->
