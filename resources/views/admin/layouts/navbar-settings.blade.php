<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/home">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Drivers</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="rounded-bottom nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('driver.admin.show') }}">List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('driver.admin.create') }}">Create</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.expense.show') }}">Expense</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">User</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="rounded-bottom nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="">List</a></li>
            <li class="nav-item"><a class="nav-link" href="">Create</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="icon-bar-graph menu-icon"></i>
          <span class="menu-title">Vehicles</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="rounded-bottom nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="">List</a></li>
            <li class="nav-item"> <a class="nav-link" href="">Create</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="icon-grid-2 menu-icon"></i>
          <span class="menu-title">Bookings</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="rounded-bottom nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="">List</a></li>
            <li class="nav-item"> <a class="nav-link" href="">Create</a></li>
            <li class="nav-item"> <a class="nav-link" href="">Stats</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="icon-contract menu-icon"></i>
          <span class="menu-title">Administration</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
          <ul class="rounded-bottom nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="">User Management</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>