<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="{{url('palika/dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('palika/data')}}">
            <i class="bi bi-circle"></i><span>Data Tables</span>
          </a>
            <a href="{{url('palika/create')}}">
              <i class="bi bi-circle"></i><span>Create Tables</span>
            </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->


    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('palika/profile')}}">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->
{{-- 
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('../pages-register')}}">
        <i class="bi bi-card-list"></i>
        <span>Register</span>
      </a>
    </li><!-- End Register Page Nav --> --}}

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('palika.logout')}}">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Log Out</span>
      </a>
    </li><!-- End Login Page Nav -->

    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="pages-error-404.html">
        <i class="bi bi-dash-circle"></i>
        <span>Error 404</span>
      </a>
    </li><!-- End Error 404 Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-blank.html">
        <i class="bi bi-file-earmark"></i>
        <span>Blank</span>
      </a>
    </li><!-- End Blank Page Nav --> --}}

  </ul>

</aside><!-- End Sidebar-->