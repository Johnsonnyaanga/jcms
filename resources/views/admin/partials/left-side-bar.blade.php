<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">JCMS ADMIN PANEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::User()->firstname}}</a>
        </div>
      </div>

      {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{route('admin-dash')}}" class="nav-link">
                  <i class="nav-icon fas far fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

          <li class="nav-item menu-open">

            <a href="#" class="nav-link active">
              {{-- <i class="nav-icon fas fa-users"></i> --}}
              <p>
                User management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>


            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('list-agents')}}" class="nav-link">
                    {{-- <i class="nav-icon fas fa-users"></i> --}}
                    <i class="nav-icon fas fa-bars"></i>
                    <p>Agents</p>
                  </a>
                </li>
              </ul>



            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list-roles')}}" class="nav-link">
                  {{-- <i class="nav-icon fas fa-users"></i> --}}
                  <i class="nav-icon fas fa-bars"></i>
                  <p>Roles</p>
                </a>
              </li>
            </ul>



              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('list-queues')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Queues</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('list-groups')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Groups</p>
                  </a>
                </li>
              </ul>




          </li>


          <li class="nav-item menu-open">

            <a href="#" class="nav-link active">
              {{-- <i class="nav-icon fas fa-users"></i> --}}
              <p>
                Manage
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>


            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link">
                      <i class="nav-icon fas fa-bars"></i>
                   <p>Email</p>
                  </a>
                </li>
              </ul>


            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list-sla')}}" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                 <p>SLA</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('list-ticket-types')}}" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>Ticket Types</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('list-services')}}" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>Ticket Services</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('list-priorities')}}" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        Priority
                    </p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('list-statuses')}}" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        Status
                    </p>
                  </a>
                </li>
              </ul>




          </li>






          <li class="nav-header">Settings</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
                <i class="fa-thin fa-gear"></i>
              <p>
                System Logs
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
