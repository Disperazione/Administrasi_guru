<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SIFOS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item  @if(Request::is('admin/dashboard')) active @endif">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @if (Auth::user()->role == 'admin')
            <li class="menu-header">Master</li>
            @if (Auth::user()->role == 'admin')
            <li class="   @if(Request::is('admin/guru','admin/guru/*')) active @endif">
                <a href="{{ route('admin.guru.index') }}" class="nav-link "><i
                        class="fas fa-users"></i><span>Guru</span></a>
            </li>
            <li class="  @if(Request::is('admin/jurusan','admin/jurusan/*')) active @endif">
                <a href="{{ route('admin.jurusan.index') }}" class="nav-link "><i
                        class="fas fa-users"></i><span>Jurusan</span></a>
            </li>
            @endif
            <li class="  @if(Request::is('admin/kompetensi_dasar','admin/kompetensi_dasar/*')) active @endif">
                <a href="{{ route('admin.kompetensi_dasar.index') }}" class="nav-link "><i
                        class="fas fa-users"></i><span>Kd</span></a>
            </li>
            @endif
            @if (Auth::user()->role == 'guru')
            <li class="menu-header">Lembar kerja</li>
            <li
                class="nav-item dropdown @if(Request::is('admin/Lembar-kerja-1','admin/Lembar-kerja-1/*','admin/Lembar-kerja-2','admin/Lembar-kerja-2/*','admin/Lembar-kerja-3','admin/Lembar-kerja-3/*','admin/Lembar-kerja-4','admin/Lembar-kerja-4/*','admin/RPP','admin/RPP/*')) active @endif">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa fa-tasks"></i>
                    <span>Lembar kerja</span></a>
                <ul class="dropdown-menu">
                    <li class="  @if(Request::is('admin/Lembar-kerja-1','admin/Lembar-kerja-1/*')) active @endif">
                        <a href="{{ route('admin.Lembar-kerja-1.index') }}" class="nav-link "><i
                                class="fas fa fa-tasks"></i><span>LK 1</span></a>
                    </li>
                    <li class="  @if(Request::is('admin/Lembar-kerja-2','admin/Lembar-kerja-2/*')) active @endif">
                        <a href="{{ route('admin.Lembar-kerja-2.index') }}" class="nav-link "><i
                                class="fas fa fa-tasks"></i><span>LK 2</span></a>
                    </li>
                    <li class="  @if(Request::is('admin/Lembar-kerja-3','admin/Lembar-kerja-3/*')) active @endif">
                        <a href="{{ route('admin.Lembar-kerja-3.index') }}" class="nav-link "><i
                                class="fas fa fa-tasks"></i><span>LK 3</span></a>
                    </li>
                    <li class="  @if(Request::is('admin/Lembar-kerja-4','admin/Lembar-kerja-4/*')) active @endif">
                        <a href="{{ route('admin.Lembar-kerja-4.index') }}" class="nav-link "><i
                                class="fas fa fa-tasks"></i><span>LK 4</span></a>
                    </li>
                </ul>
            </li>
            <li class="  @if(Request::is('admin/RPP','admin/RPP/*')) active @endif">
                <a href="{{ route('admin.RPP.index') }}" class="nav-link "><i
                        class="fas fa fa-tasks"></i><span>RPP</span></a>
            </li>
            @endif
        </ul>
    </aside>
</div>
