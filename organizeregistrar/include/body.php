<!-- Page Content -->
<div id="page-content-wrapper">
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
      <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
      <h2 class="fs-2 m-0">Dashboard</h2>
    </div>
  </nav>
  <div class="container-fluid px-4 mt-5">

    <div class="tab-content">

      <div id="dashboard" class="container tab-pane fade"><br>
        <?php include 'REGISTRAR-DASHBOARD.php'; ?>
      </div>

      <div id="adsched" class="container tab-pane fade"><br>
        <?php include 'ADMISSION-SCHEDULING.php'; ?>
      </div>

      <div id="admanage" class="container tab-pane fade"><br>
        <?php include 'REGISTRAR-ADMISSION-TBL.php'; ?>
      </div>

      <div id="examinee" class="container tab-pane fade"><br>
        <?php include 'REGISTRAR-LIST-EXAMINEE.php'; ?>
      </div>

      <div id="passer" class="container tab-pane fade"><br>
        <?php include 'REGISTRAR-PASSERS.php'; ?>
      </div>

      <div id="enrollsched" class="container tab-pane fade"><br>
        <?php include 'ENROLLMENT-SCHEDULING.php'; ?>
      </div>

      <div id="enrollee" class="container tab-pane fade"><br>
        <?php include 'ENROLLEE.php'; ?>
      </div>

      <div id="enrolled" class="container tab-pane fade"><br>
        <?php include 'ENROLLED-LIST.php'; ?>
      </div>

      <div id="profinfo" class="container tab-pane fade"><br>

        <?php include 'PROFESSOR-LIST.php'; ?>
      </div>

      <div id="studentinfo" class="container tab-pane fade"><br>

        <?php include 'STUDENTINFO.php'; ?>
      </div>

      <div id="grades" class="container tab-pane fade"><br>
        <h2>Grades</h2>
      </div>

      <div id="courses" class="container tab-pane fade"><br>
        <?php include 'COURSES.php'; ?>
      </div>

      <div id="curiculum" class="container tab-pane fade"><br>
        <?php include 'REGISTRAR-CURRICULUM.php'; ?>
      </div>

      <div id="eval" class="container tab-pane fade"><br>
        <?php include 'evaluation.php'; ?>
      </div>

      <div id="accmanage" class="container tab-pane fade"><br>
        <h2>Account Managemnt</h2>
      </div>

    </div>
  </div>
</div>
