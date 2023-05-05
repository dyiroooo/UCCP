<div class="d-flex" id="wrapper">
  <?php include 'includes/sidebar.php'; ?>
  <!-- Page Content -->
  <div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
      <div class="d-flex align-items-center">
        <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Admin Dashboard</h2>
      </div>
    </nav>

    <div class="container-fluid px-4 mt-5">
      <center>
        <div class="tab-content">

          <!-- Start of Student Accounts  -->
          <div id="studentacc" class="container tab-pane fade"><br>
            <h1>Enrolled Student Accounts</h1>
          </div>
          <!-- End of Student Accounts -->

          <!-- Start of News Management -->
          <div id="newsman" class="container tab-pane fade"><br>
            <?php include 'newsmanagement.php'; ?>
          </div>
          <!-- End of News Management -->

          <!-- Start of Student Info -->
          <div id="studentinfo" class="container tab-pane fade"><br>
            <h1>Student Information</h1>
          </div>
          <!-- End of Student Info -->

          <!-- Start of Prof Info -->
          <div id="professorinfo" class="container tab-pane fade"><br>
            <h1>Professor Information</h1>
          </div>
          <!-- End of Prof Info -->

          <!-- Start of Admin Accounts Management -->
          <div id="accounts" class="container tab-pane fade"><br>
            <?php include 'adminaccount.php'; ?>
          </div>
          <!-- End of Admin Accounts Management -->

          <!-- Start of Home Template -->
          <div id="hometemp" class="container tab-pane fade"><br>
            <?php include 'hometemplate.php'; ?>
          </div>
          <!-- End of Home Template -->

          <!-- Start of Board of Regents -->
          <div id="boardreg" class="container tab-pane fade"><br>
            <?php include 'boardofregents.php'; ?>
          </div>
          <!-- Board of Regends End -->

          <!-- Executive Office Start -->
          <div id="execoffice" class="container tab-pane fade"><br>
            <?php include 'executiveoffices.php'; ?>
          </div>
          <!-- Executive Office End -->

        </center>
      </div>
    </div>
  </div>
</div>
<!-- /#page-content-wrapper -->
