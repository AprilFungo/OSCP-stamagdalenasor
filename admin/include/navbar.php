<body class="antialiased background-logo">
    
      <!-- header -->
      <header class="navbar navbar-expand-md navbar-dark navbar-overlap d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown d-none d-md-flex me-3">
              <a href="notifications" class="nav-link px-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path><path d="M9 17v1a3 3 0 0 0 6 0v-1"></path></svg>
                <span class="badge bg-red"></span>
              </a>
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <div class="d-none d-xl-block ps-2">
                  <div><?php echo $fullname; ?></div>
                  <div class="mt-1 small text-muted"><?php if ($type == 1){echo 'Admin';}else{echo'Staff';}?></div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="manage" class="dropdown-item">
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>Manage
                </a>
                <a href="../logout" class="dropdown-item">
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M7 12h14l-3 -3m0 6l3 -3" /></svg>Log out
                </a>
              </div>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
              <ul class="navbar-nav">
                <li class="nav-item <?php if($active=="index"){echo'active';}?>">
                  <a class="nav-link" href="index" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>
                <li class="nav-item dropdown <?php if($active=="applications"){echo'active';}?>">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >                    
                    <span class="nav-link-title">
                      Application Form
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="pending_applications" >
                          Pending
                        </a>
                        <a class="dropdown-item" href="approved_applications" >
                          Approved
                        </a>
                        <a class="dropdown-item" href="declined_applications" >
                          Declined
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown <?php if($active=="seniors"){echo'active';}?>">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >                    
                    <span class="nav-link-title">
                      Senior Citizen
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="pending_seniors" >
                          Pending <!--<span class="badge badge-danger bg-danger" style="margin-left: 5px;">1</span> -->
                        </a>
                        <a class="dropdown-item" href="approved_seniors" >
                          Approved
                        </a>
                        <a class="dropdown-item" href="declined_seniors" >
                          Declined
                        </a>
                        <a class="dropdown-item" href="deleted_seniors" >
                          Deleted
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item <?php if($active=="announcements"){echo'active';}?>">
                  <a class="nav-link" href="announcements" >                   
                    <span class="nav-link-title">
                      Announcements
                    </span>
                  </a>
                </li>
                <!--
                <li class="nav-item <?php //if($active=="notifications"){echo'active';}?>">
                  <a class="nav-link" href="notifications" >                   
                    <span class="nav-link-title">
                      Notifications
                    </span>
                  </a>
                </li> -->
                <?php if ($type == 1){?>
                  <li class="nav-item dropdown <?php if($active=="staff"){echo'active';}?>">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >                    
                    <span class="nav-link-title">
                      Staff
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="staff" >
                          Active <!--<span class="badge badge-danger bg-danger" style="margin-left: 5px;">1</span> -->
                        </a>
                        <a class="dropdown-item" href="inactive_staff" >
                          Inactive
                        </a>
                      </div>
                    </div>
                  </div>
                </li>              
                <li class="nav-item <?php if($active=="logs"){echo'active';}?>">
                  <a class="nav-link" href="logs" >                   
                    <span class="nav-link-title">
                      Logs
                    </span>
                  </a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </header>
      <!-- end of header -->
