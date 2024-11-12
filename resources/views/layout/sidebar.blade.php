<nav class="mt-2"> <!--begin::Sidebar Menu-->
    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        <li class="nav-item"> <a href="/" class="nav-link nav-link {{ Request::is('/') ? 'active' : '' }}"> <i
                    class="nav-icon bi bi-speedometer"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item"> <a href="/employees"
                class="nav-link {{ Request::is('employees') || Request::is('employees/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-people-fill"></i>
                <p>Employees</p>
            </a>
        </li>
        <li class="nav-item"> <a href="/kpi-categories"
                class="nav-link {{ Request::is('employees') || Request::is('employees/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-people-fill"></i>
                <p>Employees</p>
            </a>
        </li>
        {{-- <li class="nav-item"> <a href="/nasabah"
                class="nav-link {{ Request::is('nasabah') || Request::is('nasabah/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-people-fill"></i>
                <p>Nasabah</p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('report') || Request::is('report/*') ? 'menu-open' : '' }}">
            <a href="/report/kunjungan"
                class="nav-link {{ Request::is('report') || Request::is('report/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-layout-text-window-reverse"></i>
                <p>
                    Report
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview"
                style="{{ Request::is('report') || Request::is('report/*') ? 'display: block;' : 'display: none;' }} box-sizing: border-box;">
                <li class="nav-item">
                    <a href="/report/kunjungan" class="nav-link {{ Request::is('report/kunjungan') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-circle" style="color: #ff3b34"></i>
                        <p>Report Kunjungan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/report/marketing" class="nav-link {{ Request::is('report/marketing') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-circle " style="color: #36f805"></i>
                        <p>Report Marketing</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/report/survei" class="nav-link {{ Request::is('report/survei') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-circle" style="color: #e8f805"></i>
                        <p>Report Survei</p>
                    </a>
                </li>
            </ul>
        </li> --}}
    </ul> <!--end::Sidebar Menu-->
</nav>
