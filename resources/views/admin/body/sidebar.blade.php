


<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Noble<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
        <!--dashboard-->  
          <li class="nav-item">
            <a href="dashboard.html" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>

          <!--manage student-->
          <li class="nav-item " >
            <a class="nav-link" data-bs-toggle="collapse" href="#manageusers" role="button" aria-expanded="false" aria-controls="manageusers">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Manage User</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="manageusers">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('admin/view') ? 'active' : '' }}" href="{{route('admin.view')}}">
                    View User
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('admin/add') ? 'active' : '' }}" href="{{route('admin.add')}}">
                    Add User
                  </a>
                </li>
              </ul>
            </div>

         
          <!--manage profile-->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#manageprofile" role="button" aria-expanded="false" aria-controls="manageprofile">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Manage Profile</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="manageprofile">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('admin/profile*') ? 'active' : '' }}" href="{{route('admin.profile')}}">
                    Your Profile
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('admin/password') ? 'active' : '' }}" href="{{route('admin.password')}}">
                    Change Password
                  </a>
                </li>
                
              </ul>
            </div>





            <!--Setup Management-->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#setupmanagement" role="button" aria-expanded="false" aria-controls="setupmanagement">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Setup Management</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="setupmanagement">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('admin/student/class*') ? 'active' : '' }}" href="{{route('admin.student.class')}}">
                    Student Class
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link {{ Request::is('admin/student/year*') ? 'active' : '' }}" href="{{route('admin.student.year')}}">
                    Student Year
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('admin/student/group*') ? 'active' : '' }}" href="{{route('admin.student.group')}}">
                    Student Group
                  </a>

                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/student/shift*') ? 'active' : '' }}" href="{{route('admin.student.shift')}}">
                      Student Shift
                    </a>

                    <li class="nav-item">
                      <a class="nav-link {{ Request::is('admin/fee/category*') ? 'active' : '' }}" href="{{route('admin.fee.category')}}">
                        Fee Category
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ Request::is('admin/fee/amount*') ? 'active' : '' }}" href="{{route('admin.fee.amount')}}">
                        Fee Category Amount
                      </a>
                    </li>
                
              </ul>
            </div>
          
        






          <li class="nav-item nav-category">User Interface</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Components</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                </li>
                
                 
                
              </ul>
            </div>
          </li>
        
          
        </ul>
      </div>
    </nav>