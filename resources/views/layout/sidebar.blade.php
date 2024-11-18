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
                class="nav-link {{ Request::is('kpi-categories') || Request::is('kpi-categories/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-clipboard-check"></i>
                <p>KPI Categories</p>
            </a>
        </li>
        <li class="nav-item"> <a href="/kpi-indicators"
                class="nav-link {{ Request::is('kpi-indicators') || Request::is('kpi-indicators/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-clipboard-check"></i>
                <p>KPI Indicators</p>
            </a>
        </li>
        <li class="nav-item"> <a href="/kpi-periods"
                class="nav-link {{ Request::is('kpi-periods') || Request::is('kpi-periods/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-clipboard-check"></i>
                <i class=""></i>
                <p>KPI Periods</p>
            </a>
        </li>
        <li class="nav-item"> <a href="/evaluations"
                class="nav-link {{ Request::is('evaluations') || Request::is('evaluations/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-clipboard-check"></i>
                <p>Evaluations</p>
            </a>
        </li>
        <li class="nav-item"> <a href="/performance-scores"
                class="nav-link {{ Request::is('performance-scores') || Request::is('performance-scores/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-clipboard-check"></i>
                <p>Performance Score</p>
            </a>
        </li>
        <li class="nav-item"> <a href="/bonuses"
                class="nav-link {{ Request::is('bonuses') || Request::is('bonuses/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-currency-exchange"></i>
                <p>Bonuses</p>
            </a>
        </li>
        <li class="nav-item"> <a href="/salaries"
                class="nav-link {{ Request::is('salaries') || Request::is('salaries/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-currency-exchange"></i>
                <p>Salaries</p>
            </a>
        </li>
        <li class="nav-item"> <a href="/reports"
                class="nav-link {{ Request::is('reports') || Request::is('reports/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-journal-text"></i>
                <p>Report</p>
            </a>
        </li>
        <li class="nav-item"> <a href="/settings"
                class="nav-link {{ Request::is('settings') || Request::is('settings/*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-gear"></i>
                <p>Settings</p>
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
