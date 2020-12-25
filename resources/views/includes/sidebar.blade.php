<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"><i class
                        ="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Menu</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('menu.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Menu</a>
                </li>
                <li class="">
                    <a href="{{ route('menu.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Menu</a>
                </li>

                <li class="menu-title">Category</li><!-- /.menu-title -->
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-list"></i>Lihat Category</a>
                </li>
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-plus"></i>Tambah Category</a>
                </li>

                <li class="menu-title">Pesanan</li><!-- /.menu-title -->
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-list"></i>Lihat pesanan</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>