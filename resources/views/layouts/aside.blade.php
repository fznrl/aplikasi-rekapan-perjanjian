 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-lightblue-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link navbar-info">
      <img src="{{asset('')}}assets/dist/img/pelindo.png" alt="pelindo" class="brand-image img-circle">
      <span class="brand-text">SBU Marine Service</span>
    </a>
    {{-- <button class="d-block d-sm-none" onclick="closeSidebar()">x</button> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      @php
          $category = new App\Models\Category;
          $categories = $category::all();
      @endphp
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">KATEGORI</li>
          @foreach ($categories as $kategori)
          <li class="nav-item">
            <a href="{{ route('perjanjian', ['slug'=>$kategori->slug, 'id'=>$kategori->id]) }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>{{ $kategori->name }}</p>
            </a>
          </li>
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>