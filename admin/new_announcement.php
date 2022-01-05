<!doctype html>
<html lang="en">
<?php 
    $title = 'OSCP'; 
    $module = "Announcement"; 
    $active = 'index'; 
    include 'include/head.php';
    include 'include/navbar.php';
  ?>
 
      <div class="page-wrapper">
          <!-- Page title -->
        <div class="container-xl">
          <div class="page-header text-white d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Module
                </div>
                <h2 class="page-title">
                  Dashboard
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                    Create Announcement
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
            <!-- content -->
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">PENDING APPLICATION FORM</div>
                        </div>
                        <a href="pending_application" style="text-decoration: none;">
                        <div class="row pt-3">
                            <div class="col-auto">
                                <i class="fa fa-clipboard-list fa-xl text-warning" style="font-size: 55px;"></i>
                            </div>
                            <div class="col">
                                <div style="font-size:40px; padding-bottom:20px;" class="text-dark">0</div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">APPROVED APPLICATION FORM</div>
                        </div>
                        <a href="approved_application" style="text-decoration: none;">
                        <div class="row pt-3">
                            <div class="col-auto">
                                <i class="fa fa-clipboard-check fa-xl text-success" style="font-size: 55px;"></i>
                            </div>
                            <div class="col">
                                <div style="font-size:40px; padding-bottom:20px;" class="text-dark">0</div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">DECLINED APPLICATION FORM</div>
                        </div>
                        <a href="declined_application" style="text-decoration: none;">
                        <div class="row pt-3">
                            <div class="col-auto">
                                <i class="fa fa-times-circle fa-xl text-danger" style="font-size: 55px;"></i>
                            </div>
                            <div class="col">
                                <div style="font-size:40px; padding-bottom:20px;" class="text-dark">0</div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">SENIOR CITIZEN</div>
                        </div>
                        <a href="senior" style="text-decoration: none;">
                        <div class="row pt-3">
                            <div class="col-auto">
                                <i class="fa fa-users fa-xl text-info" style="font-size: 55px;"></i>
                            </div>
                            <div class="col">
                                <div style="font-size:40px; padding-bottom:20px;" class="text-dark">0</div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

               
                <div class="col pt-4">
                <h2 class="page-title">
                  ANNOUNCMENT
                </h2>
              </div>
                <div class="col-md-12">
                    <div class="card" style="height: calc(40rem + 10px)">
                        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                            <div class="divide-y">
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar">JL</span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 1</strong> 
                                    </div>
                                    <div class="text-muted">yesterday</div>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div class="badge bg-primary"></div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 2</strong> 
                                    </div>
                                    <div class="text-muted">2 days ago</div>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div class="badge bg-primary"></div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 3</strong> 
                                    </div>
                                    <div class="text-muted">today</div>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div class="badge bg-primary"></div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 4</strong> 
                                    </div>
                                    <div class="text-muted">4 days ago</div>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div class="badge bg-primary"></div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/001f.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 5</strong> 
                                    </div>
                                    <div class="text-muted">2 days ago</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar">EP</span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 6</strong> 
                                    </div>
                                    <div class="text-muted">yesterday</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/002f.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 6</strong> 
                                    </div>
                                    <div class="text-muted">2 days ago</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/003f.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 7</strong> 
                                    </div>
                                    <div class="text-muted">4 days ago</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar">HS</span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 8</strong> 
                                    </div>
                                    <div class="text-muted">today</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/006m.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 9</strong> 
                                    </div>
                                    <div class="text-muted">yesterday</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/004f.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 10</strong> 
                                    </div>
                                    <div class="text-muted">2 days ago</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/007m.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 11</strong> 
                                    </div>
                                    <div class="text-muted">2 days ago</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar">SA</span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 12</strong> 
                                    </div>
                                    <div class="text-muted">2 days ago</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/009m.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 13</strong> 
                                    </div>
                                    <div class="text-muted">2 days ago</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/010m.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 14</strong> 
                                    </div>
                                    <div class="text-muted">3 days ago</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/005f.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 15</strong> 
                                    </div>
                                    <div class="text-muted">4 days ago</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar" style="background-image: url(./static/avatars/006f.jpg)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 16</strong> 
                                    </div>
                                    <div class="text-muted">2 days ago</div>
                                </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-auto">
                                    <span class="avatar">AA</span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                    <strong>Announcement 17</strong> 
                                    </div>
                                    <div class="text-muted">2 days ago</div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- end of content -->
          </div>
        </div>
      </div>
<?php
    include('include/footer.php');
?>