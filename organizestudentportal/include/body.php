<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Dashboard</h2>
        </div>
      </nav>
            <!-- Details -->
          <div class="container-fluid px-4 mt-5">
              <div class="tab-content">
                <div id="home" class="container tab-pane fade">
                  <?php include 'sidebarpage/HOME.php'; ?>
                </div>

                <div id="studentinfo" class="container tab-pane fade"><br>
                    <?php include 'sidebarpage/STUDENTPROFILE.php'; ?>
                </div>

                <div id="grades" class="container tab-pane fade"><br>
                  <?php include 'sidebarpage/GRADES.php'; ?>
                </div>


                <div id="sched" class="container tab-pane fade"><br>
                    <?php include 'sidebarpage/SCHEDULE.php'; ?>
                </div>


                <div id="accsetting" class="container tab-pane fade"><br>
                    <?php include 'sidebarpage/ACCOUNTSETTINGS.php'; ?>
              </div>


                <div id="accstatus" class="container tab-pane fade"><br>
                  <h1>Account Status</h1>
                </div>


                <div id="enroll" class="container tab-pane fade"><br>
                    
                  <?php include 'sidebarpage/ENROLL.PHP'; ?>
                </div>

              </div>
            </div>
          </div>
