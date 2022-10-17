<x-sidebar-nav>
    <x-nav-item>
        <a href="{{ url('dashboard') }}" class="nav-link collapsed">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </x-nav-item> {{--  End Dashboard Nav  --}}
    
    <x-nav-item>
    <x-nav-link data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-article-line"></i>
        <span>Bulletin Board</span>
        <i class="bi bi-chevron-down ms-auto"></i>
    </x-nav-link>
    <x-nav-content id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ url('bulletin-board/news') }}">
                <i class="bi bi-circle"></i>
                <span>News</span>
            </a>
        </li>
        <li>
            <a href="{{ url('bulletin-board/health-tips') }}">
                <i class="bi bi-circle"></i>
                <span>Health Tips</span>
            </a>
        </li>
    </x-nav-content>
    </x-nav-item> {{--  End Bullitin Board  --}}
    <x-nav-item>
        <x-nav-link data-bs-target="#incidents-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-cone-striped"></i>
            <span>Incidents</span>
            <i class="bi bi-chevron-down ms-auto"></i>
        </x-nav-link>
        <x-nav-content id="incidents-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('incidents/alerts') }}">
                    <i class="bi bi-circle"></i>
                    <span>Incident Alerts</span>
                </a>
            </li>
            <li>
                <a href="{{ url('news') }}">
                    <i class="bi bi-circle"></i>
                    <span>Incident Reports Archives</span>
                </a>
            </li>
        </x-nav-content>
    </x-nav-item>
    <x-nav-item>
        <x-nav-link data-bs-target="#maintenance-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-cpu"></i>
            <span>Maintenance</span>
            <i class="bi bi-chevron-down ms-auto"></i>
        </x-nav-link>
        <x-nav-content id="maintenance-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('users') }}">
                    <i class="bi bi-circle"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="{{ url('residents') }}">
                    <i class="bi bi-circle"></i>
                    <span>Residents</span>
                </a>
            </li>
            <li>
                <a href="{{ url('positions') }}">
                    <i class="bi bi-circle"></i>
                    <span>Positions</span>
                </a>
            </li>
            <li>
                <a href="{{ url('incident-types') }}">
                    <i class="bi bi-circle"></i>
                    <span>Incident Types</span>
                </a>
            </li>
        </x-nav-content>
    </x-nav-item>
    
</x-sidebar-nav>