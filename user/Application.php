<!doctype html>
<html lang="en">
  <?php 
    $title = 'SCOP'; 
    $module = "Dashboard"; 
    $active = 'application'; 
    include 'include/head.php';
    include 'include/side.php';
    include 'include/navbar.php';
  ?>
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Overview
                </div>
                <h2 class="page-title">
                  Application
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- BODY -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <!-- CONTENT -->
                <div>
                    <div class="container-tight py-4">
                        <div class="empty">
                            <div class="empty-img"><img src="asset/sgv/undraw_quitting_time_dm8t.svg" height="128" alt=""></div>
                            <p class="empty-title">Temporarily down for maintenance</p>
                            <p class="empty-subtitle text-muted">
                                Sorry for the inconvenience but we’re performing some maintenance at the moment. We’ll be back online shortly!
                            </p>
                            <div class="empty-action">
                                <a href="index" class="btn btn-primary">
                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="5" y1="12" x2="19" y2="12"></line><line x1="5" y1="12" x2="11" y2="18"></line><line x1="5" y1="12" x2="11" y2="6"></line></svg>
                                Back
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
 <?php include("include/footer.php"); ?>
</html>