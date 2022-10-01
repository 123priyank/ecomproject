<div class="sidebar" style="background-color:#E57028;">
    <!-- Sidebar user panel (optional) -->
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2 ">
        <div class="input-group sidebar_search" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar " name="search" style="color:black; background-color:#EB8343;"
                   type="search" placeholder="Search" aria-label="Search" id="search">
            <div class="input-group-append">
                <button class="btn btn-sidebar" style="background-color:#E57028;">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column nav-treeview" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class=" nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        <b>Dashboard</b>
                    </p>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="{{route('category')}}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        <b>Category</b>
                        {{--                        <i class="fas fa-angle-left right"></i>--}}

                    </p>
                </a>
                {{--                <ul class="nav nav-treeview">--}}
                {{--                    <li class="nav-item">--}}
                {{--                        <a href="#" class="nav-link">--}}
                {{--                            <i class="far fa-circle nav-icon"></i>--}}
                {{--                            <p>Fixed Sidebar <small>+ Custom Area</small></p>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                    <li class="nav-item">--}}
                {{--                        <a href="#" class="nav-link">--}}
                {{--                            <i class="far fa-circle nav-icon"></i>--}}
                {{--                            <p>Fixed Navbar</p>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                    <li class="nav-item">--}}
                {{--                        <a href="#" class="nav-link">--}}
                {{--                            <i class="far fa-circle nav-icon"></i>--}}
                {{--                            <p>Fixed Footer</p>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                    <li class="nav-item">--}}
                {{--                        <a href="#" class="nav-link">--}}
                {{--                            <i class="far fa-circle nav-icon"></i>--}}
                {{--                            <p>Collapsed Sidebar</p>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                </ul>--}}
            </li>
            <li class="nav-item mt-2">
                <a href="{{route('product')}}" class="nav-link">
                    <i class="nav-icon fas fa-shopping-bag"></i>
                    <p>
                       <b>Product</b>
                        {{--                        <i class="fas fa-angle-left right"></i>--}}
                    </p>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="{{route('brands')}}" class="nav-link">
                    <i class="nav-icon fas fa-shopping-basket" ></i>
                    <p>
                        <b>Brands</b>
                        {{--                        <i class="fas fa-angle-left right"></i>--}}

                    </p>
                </a>
            </li>

            <li class="nav-item mt-2">
                <a href="{{route('coupon')}}" class="nav-link">
                    <i class="nav-icon fas fa-tag"></i>
                    <p>
                        <b>Coupon</b>
                        {{--                        <i class="fas fa-angle-left right"></i>--}}

                    </p>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="{{route('size')}}" class="nav-link">
                    <i class="nav-icon fas fa-window-maximize"></i>
                    <p>
                        <b>Size</b>
                        {{--                        <i class="fas fa-angle-left right"></i>--}}

                    </p>
                </a>
            </li>
            <li class="nav-item mt-2">
                <a href="{{route('color')}}" class="nav-link">
                    <i class="nav-icon fas fa-palette"></i>
                    <p>
                        <b>Color</b>
                        {{--                        <i class="fas fa-angle-left right"></i>--}}

                    </p>
                </a>
            </li>

            <li class="nav-item mt-2">
                <a href="{{route('banner')}}" class="nav-link">
                    <i class="nav-icon fas fa-camera-retro fa-2x"></i>
                    <p>
                        <b>Banner</b>
                        {{--                        <i class="fas fa-angle-left right"></i>--}}

                    </p>
                </a>
            </li>

            <li class="nav-item mt-2">
                <a href="{{route('taxs')}}" class="nav-link">
                    <i class="nav-icon fas fa-percent"></i>
                    <p>
                        <b>Tax</b>
                        {{--                        <i class="fas fa-angle-left right"></i>--}}

                    </p>
                </a>
            </li>

            {{--                <ul class="nav nav-treeview">--}}
            {{--                    <li class="nav-item">--}}
            {{--                        <a href="#" class="nav-link">--}}
            {{--                            <i class="far fa-circle nav-icon"></i>--}}
            {{--                            <p>General</p>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nav-item">--}}
            {{--                        <a href="#" class="nav-link">--}}
            {{--                            <i class="far fa-circle nav-icon"></i>--}}
            {{--                            <p>Icons</p>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                    <li class="nav-item">--}}
            {{--                        <a href="#" class="nav-link">--}}
            {{--                            <i class="far fa-circle nav-icon"></i>--}}
            {{--                            <p>Buttons</p>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}


            <li class="nav-item mt-2">
            <a href="{{route('customer')}}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        <b>Customer</b>
                        {{--                        <i class="fas fa-angle-left right"></i>--}}

                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('profile')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Profle
                        {{--                        <i class="fas fa-angle-left right"></i> this i class is for dropdown arrow--}}
                    </p>
                </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a href="#" class="nav-link">--}}
{{--                    <i class="nav-icon fas fa-table"></i>--}}
{{--                    <p>--}}
{{--                        Cart--}}
{{--                        <i class="fas fa-angle-left right"></i>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Simple Tables</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>jsGrid</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>

