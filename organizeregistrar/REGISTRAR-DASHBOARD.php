<?php
include 'include/header.php';
include 'include/config.php';
?>

<!-- <div class="d-flex" id="wrapper"> -->
  <?php include 'include/sidebar.php'; ?>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
      <div class="d-flex align-items-center">
        <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Registrar Dashboard</h2>
      </div>
    </nav>
    <div class="container py-3">
      <div class="row">
        <div class="col-md-12">
          <div class="container">
            <div class="card">
              <div class="card-header">
                <center><h1>Registrar Panel</h1>
                  <ol class="breadcrumb mb-4 justify-content-center">
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol></center>
                </div>
                <div class="card-body">
                   <div id="piechart" style="width: 900px; height: 500px;"></div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include 'include/footer.php';
  ?>
