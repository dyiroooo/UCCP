<?php
include 'include/header.php';
include 'include/config.php';
?>

<?php include 'include/sidebar.php'; ?>
<div id="page-content-wrapper">
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
      <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
      <h2 class="fs-2 m-0">Dashboard</h2>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <center>
              <h1>List of Paid Enrollees</h1>
            </center>
          </div>
          <div class="card-body" id="displayTableE">

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include 'include/footer.php';
  ?>

  <script>
    $(document).ready(function() {
      //List Paid Applicants
      displayTableE();
    });

    function E(id) {
      alert(id);
      if (confirm("Are you Sure You Want to Accept This Enrollee ?")) {
        $.ajax({
          url: 'acceptenrollee.php',
          type: 'post',
          data: {
            accept: id
          },
          success: function(data) {
            $('#row' + id).hide('slow');
            displayTableE();
          }
        });
      }
    }

    function displayTableE() {
      var display = "true";
      $.ajax({
        url: 'table-paidenrollee.php',
        type: 'post',
        data: {
          display: display
        },
        success: function(data, status) {
          $('#displayTableE').html(data);
        }
      })
    }
  </script>