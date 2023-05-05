<?php
include 'include/header.php';
include 'include/config.php';
?>

<?php
include ("include/config.php");
$z = "SELECT  DISTINCT schoolyear  FROM `uccp_enrollment_schedule` ";
$results = mysqli_query($conn,$z);

?>
  <?php include 'include/sidebar.php'; ?>
  <div class="" id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
      <div class="d-flex align-items-center">
        <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Registrar Dashboard</h2>
      </div>
    </nav>

  <div class="container py-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h1 align = "center">List Of Enrolled</h1>
            <div class="mb-4 text-center mt-4 ">
              <select class="form-control" name="SY" id="schoolyear1">
                <option value="" class="text-center">SELECT</option>
                <?php
                while($r = mysqli_fetch_assoc($results)){
                  echo '<option class="text-center">'.$r['schoolyear'].'</option>';;
                }
                ?>
              </select>
            </div>
          </div>
          <div class="card-body">
            <?php

            $sql= "SELECT * FROM `uccp_enrolled`";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
              ?>
              <table class="table text-center cell-border table-hover" id="Enrolled">
                <thead class = "text-center">
                  <tr>
                    <th  class="text-center" >STUDENT INFO</th>
                    <th  class="text-center" >COURSE DETAILS</th>
                  </tr>
                </thead>
                <?php  while($row = mysqli_fetch_array($result))
                {
                  ?>
                  <tr align="justify" id="row<?php echo '.$id.' ?>">
                    <td><strong><?php echo $row['name'] ?></strong><br><?php echo $row['gender'] ?> <br> <?php echo $row['birthday'] ?> <br> <?php echo $row['birthplace'] ?> <br> <?php echo $row['address'] ?> <br> <?php echo $row['email'] ?> <br><?php echo $row['phone'] ?> </td>
                    <td><?php echo $row['course'] ?> <br> <?php echo $row['year'] ?> <br><?php echo $row['sem'] ?> Semester <br> <?php echo $row['schoolyear'] ?></td>
                  </tr>
                  <?php
                }
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include 'include/footer.php';
  ?>

  <script type="text/javascript">
  $(document).ready(function(){
    var enrolled =$('#Enrolled').DataTable();
    $('#schoolyear1').on('change', function () {
      enrolled.search( this.value ).draw();
    });
  })

  function schoolyear1(){

    var s = document.getElementById("schoolyear1").value;
    $.ajax({
      url: "table-enrolled.php",
      type: "post",
      data: {s:s},
      success:function(data,status){
        $('#displayTableEnrolled').html(data);
      }
    });
  }

  </script>
