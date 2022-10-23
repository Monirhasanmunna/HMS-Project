<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="{{Route('app.dashboard')}}" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-user-doctor"></i>
            <p>
              Doctor
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{Route('app.doctor.create')}}" class="nav-link">
                <i class="fa-solid fa-circle-plus"></i>
                <p>Doctor Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('app.doctor.index')}}" class="nav-link">
                <i class="fa-solid fa-list"></i>
                <p>Doctor List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-user-nurse"></i>
            <p>
              Assistant
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{Route('app.assistant.create')}}" class="nav-link">
                <i class="fa-solid fa-circle-plus"></i>
                <p>Assistant Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('app.assistant.index')}}" class="nav-link">
                <i class="fa-solid fa-list"></i>
                <p>Assistant List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-user-nurse"></i>
            <p>
              Disease
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{Route('app.disease.create')}}" class="nav-link">
                <i class="fa-solid fa-circle-plus"></i>
                <p>Disease Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{Route('app.disease.index')}}" class="nav-link">
                <i class="fa-solid fa-list"></i>
                <p>Disease List</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">MISCELLANEOUS</li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>