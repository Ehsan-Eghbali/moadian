<nav class="mt-2">

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">

                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice"></i>
                    <p>
                        فاکتور ها
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('invoice.index')}}" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            کارتابل من
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-import"></i>
                <p>
                    بارگزاری فایل
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('invoice.index_import')}}" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                        فایل فاکتور ها
                    </p>
                    </a>
                </li>
            </ul>

        </li>

        <li class="nav-header">تنظیمات</li>
        <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link">
                <i class="nav-icon fas fa-box-open"></i>
                <p>
                    انواع محصولات
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    کاربران
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('company.index')}}" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    شرکت ها
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('state.index')}}" class="nav-link">
                <i class="nav-icon fas fa-step-forward"></i>
                <p>
                    مراحل
                </p>
            </a>
        </li>
        <hr width="100%">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-walking"></i>
                <p>خروج</p>

            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
