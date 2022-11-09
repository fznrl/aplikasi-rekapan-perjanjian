 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-lightblue-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('')}}assets/dist/img/pelindo.png" alt="pelindo" class="brand-image img-circle">
      <span class="brand-text font-weight-light">Rekapan Perjanjian</span>
    </a>

    <!-- Sidebar -->
    {{-- <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 ">
        <div class="image">
          <img src="{{asset('')}}assets/dist/img/pelindo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- SidebarSearch Form -->
      <div class="form-inline mt-5">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">KATEGORI</li>
          <li class="nav-item">
            <a href="{{route('kategori')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Sarpras Pemanduan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Novasi ke PMS</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tuks dan Tersus</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>PT. ISMA</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Koperasi dan Arta</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>KUPP</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Sewa Rumah</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>