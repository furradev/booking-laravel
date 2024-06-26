<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item {{Auth::user()->role == 'customer' ? 'hidden' : ''}}">
        <a href="{{url('/admin')}}" class="nav-link">
          <i class="nav-icon fas fa-user-shield"></i>
          <p>
            Admin Panel
          </p>
        </a>
      </li>
      <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Pilihan Lapangan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('/firsthall')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Lapangan 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/secondhall')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Lapangan 2</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{url('/cart')}}" class="nav-link">
          <i class="nav-icon fas fa-shopping-cart"></i>
          <p>
            Keranjang
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/order')}}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Pesanan Anda
          </p>
        </a>
      </li>
    </ul>
  </nav>