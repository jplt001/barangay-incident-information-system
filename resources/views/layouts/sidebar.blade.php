<ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Bulletin Board</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/news')}}">
              <i class="bi bi-circle"></i><span>News</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/health-tips') }}">
              <i class="bi bi-circle"></i><span>Health Tips</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Incidents</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('incidents')}}">
              <i class="bi bi-circle"></i><span>Incident Alerts</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Incident Reports Archives</span>
            </a>
          </li>
          {{--  <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>  --}}
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Maintenance</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{  url('users')}}">
              <i class="bi bi-circle"></i><span>Users</span>
            </a>
          </li>
          <li>
            <a href="{{ url('residents')}}">
              <i class="bi bi-circle"></i><span>Residents</span>
            </a>
          </li>
          {{--  <li>
            <a href="{{ url('employees')}}">
              <i class="bi bi-circle"></i><span>Employees</span>
            </a>
          </li>  --}}
          <li>
            <a href="{{ url('employees')}}">
              <i class="bi bi-circle"></i><span>Incident Types</span>
            </a>
          </li>
          <li>
            <a href="{{ url('positions')}}">
              <i class="bi bi-circle"></i><span>Positions</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
    </ul>