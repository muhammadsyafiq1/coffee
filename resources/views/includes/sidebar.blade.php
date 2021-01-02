<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('home') }}"><i class
                        ="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Menu</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('menu.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Menu</a>
                </li>
                <li class="">
                    <a href="{{ route('menu.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Menu</a>
                </li>
                <li class="">
                    <a href="{{ route('gallery.index') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Foto Menu</a>
                </li>

                <li class="menu-title">Table</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('table.index') }}"> <i class="menu-icon fa fa-list"></i>Table</a>
                </li>

                <li class="menu-title">Category</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('category.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Category</a>
                </li>
                <li class="">
                    <a href="{{ route('category.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Category</a>
                </li>

                <li class="menu-title">Stories</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('story.index') }}"> <i class="menu-icon fa fa-list"></i>Story</a>
                </li>
                <li class="">
                    <a href="{{ route('story.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Story</a>
                </li>

                <li class="menu-title">Manage Time</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('time.index') }}"> <i class="menu-icon fa fa-list"></i>Setting time</a>
                </li>

                <li class="menu-title">Pesanan % Reservasi</li><!-- /.menu-title -->
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-list"></i>Lihat pesanan</a>
                    <a href="{{ route('reservation') }}"> <i class="menu-icon fa fa-list"></i>Lihat reservasi</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>