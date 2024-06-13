<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item @yield('dashboard') rounded">
            <a class="nav-link" href="/driver/home">
              <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
      <li class="nav-item @yield('booking') rounded">
          <a class="nav-link" href="{{ route('driver.booking.show') }}">
            <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Booking</span>
          </a>
      </li>
      {{-- <li class="nav-item @yield('expense') rounded">
        <a class="nav-link" href="{{ route('driver.expense.show') }}">
          <i class="icon-columns menu-icon"></i>
            <span class="menu-title">Expense</span>
        </a>
    </li> --}}
  <li class="nav-item @yield('vehicle') rounded">
    <a class="nav-link" href="{{ route('vehicle.driver.show') }}">
      <i class="fa fa-taxi menu-icon"></i>
        <span class="menu-title">Vehicles</span>
    </a>
  </li>
  </nav>