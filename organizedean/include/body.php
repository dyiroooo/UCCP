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
                <div id="curriculum" class="container tab-pane fade">
                  <?php 
                  include 'sidebarpage/CURRICULUM.php'; ?>
                </div>

                <div id="listcurriculum" class="container tab-pane fade">
                  <?php include 'sidebarpage/LISTCURRICULUM.php'; ?>
                </div>

                <div id="section" class="container tab-pane fade">
                  <?php include 'sidebarpage/SECTION.php'; ?>
                </div>

                <div id="estudentlist" class="container tab-pane fade"><br>
                  <?php include 'sidebarpage/ENROLLEDSTUDENTLIST.php'; ?>
                </div>

                <div id="schedman" class="container tab-pane fade"><br>
                  <?php include 'sidebarpage/SCHEDULEMANAGEMENT.php'; ?>
                </div>

                <div id="proflist" class="container tab-pane fade"><br>
                  <?php include 'sidebarpage/PROFESSORLIST.php'; ?>
                </div>

                <div id="deanslister" class="container tab-pane fade"><br>
                  <?php include 'sidebarpage/DEANSLISTER.php'; ?>
                </div>
                
                <div id="m" class="container tab-pane fade"><br>
                  <?php include 'sidebarpage/MASTERLIST.php'; ?>
                </div>

                <div id="deanacc" class="container tab-pane fade"><br>
                  <?php include 'sidebarpage/DEANACCOUNT.php'; ?>
                </div>

              </div>
            </div>
          </div>
