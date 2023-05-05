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
                <div id="adbill" class="container tab-pane fade">
                  <?php include 'sidebarpage/ADMISSIONBILL.php'; ?>
                </div>

                <!-- Paid Applicants -->
                <div id="paidapp" class="container tab-pane fade"><br>
                    <?php include 'sidebarpage/LISTPAIDAPPLICANTS.php'; ?>
                </div>

                <!-- Enrollment Billing -->
                <div id="enrollbill" class="container tab-pane fade"><br>
                  <?php include 'sidebarpage/ENROLLMENTBILL.php'; ?>
                </div>
                
                <!-- Paid Enrollees -->
                <div id="enrollpay" class="container tab-pane fade"><br>
                    <?php include 'sidebarpage/ENROLLPAY.php'; ?>
                </div>

                <!-- Paid Enrollees -->
                <div id="paidenroll" class="container tab-pane fade"><br>
                    <?php include 'sidebarpage/LISTPAIDENROLLEE.php'; ?>
                </div>

                <!-- Course And Fees -->
                <div id="caf" class="container tab-pane fade"><br>
                  <?php include 'sidebarpage/COURSEANDFEE.php'; ?>
              </div>

                <!-- Accounting Accounts -->
                <div id="accs" class="container tab-pane fade"><br>
                  <h1>Admin Accounts</h1>
                </div>

              </div>
            </div>
          </div>
        </div>
