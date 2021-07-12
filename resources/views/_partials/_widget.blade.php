 <!-- Main Sidebar Container -->
 <aside class="main-sidebar bg-light text-black elevation-0">
    <!-- Brand Logo -->

    <a href="/" class="brand-link " style="background-color:#dd6b39">
     <span class="brand-image" style="opacity: .8">
     <h3 class="font-weight-bold  text-light">DM</h3>
    </span>
      <span class="brand-text font-weight-light text-light">Daimond Masjid</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info text-center">
          @guest
          <h5>Please <a href="/login">login</a> or <a href="/register">register</a>  to use the full features of this app </h5>
          @else
          <span class="font-weight-bold lead"> <i class="fa fa-user-circle-o fa-lg"></i> {{Auth::user()->ministrys->name}} </span>
          @endguest
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/people" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                People

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/users" class="nav-link">
              <i class="nav-icon fa fa-user-o"></i>
              <p>
                Users
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="/view/group" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Group
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/events" class="nav-link">
              <i class="nav-icon fa fa-calendar-o"></i>
              <p>
                Events
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/followup" class="nav-link">
              <i class="nav-icon fa fa-handshake-o"></i>
              <p>
                Follow Up
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/calendar" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Calendar
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="/forms" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Forms
              </p>
            </a>
          </li> -->
          </li>
          <li class="nav-item">
            <a href="/report" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Contribution
              <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/view/contribution" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>View Contribution</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/new/contribution" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>New Contribution</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/contribution/batches" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Batches</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/funds" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>Funds</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>payment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/payment/method" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>Payment Methods</p>
                </a>
              </li>
            </ul>
            </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-gear"></i>
              <p>
                Settings
              <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/settings/password" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/settings/account" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>Account Settings</p>
                </a>
              </li>
            </ul>
            </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                Tools
              <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Import People</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>Import contact</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Import Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Import Giving</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-money nav-icon"></i>
                  <p>Merge People</p>
                </a>
              </li>
            </ul>
            </li>
          </li>
          <li class="nav-item">
            <a href="/forms" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
              Log Out

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                  </form>
            </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
