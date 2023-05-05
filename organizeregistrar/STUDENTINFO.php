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

  <div class="container py-3 ">
    <div class="row">
      <div class="col-md-12">
        <div class="container">
        <div class="card ">
          <div class="card-header">
            <h1 class="text-center">STUDENT INFORMATION</h1>
          </div>
          <div class="card-body">
            <?php
            $sql= "SELECT * FROM `uccp_studentinfo`";
            $result= mysqli_query($conn,$sql);
            ?>
            <table class="table text-center cell-border table-hover" id="s">
              <thead class = "text-center">
                <tr>
                  <th  class="text-center" >STUDENT INFO</th>
                  <th  class="text-center" >COURSE DETAILS</th>
                  <th  class="text-center" >OPERATIONS</th>
                </tr>
              </thead>
              <?php  while($row = mysqli_fetch_array($result)) {?>
                <tr align="justify" id="row<?php echo $row['id'] ?>">
                  <td><?php echo $row['name'] ?><br><?php echo $row['gender'] ?> <br> <?php echo $row['birthday'] ?> <br> <?php echo $row['address'] ?> <br> <?php echo $row['email'] ?> <br> <?php echo $row['phone'] ?> </td>
                  <td><?php echo $row['course'] ?> <br> <?php echo $row['year'] ?> <br><?php echo $row['sem'] ?> Semster <br> <?php echo $row['schoolyear'] ?></td>
                  <td  class="text-center align-middle" >
                    <button class="btn btn-danger" onclick="rejectStudent(<?php echo $row['id'];?>)"><i class="fa-sharp fa-solid fa-trash"></i></button></td>
                  </tr>
                <?php }?>
              </table>
            </div>
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


      var enrolee = $('#s').DataTable();


    });

    function rejectStudent(r){
      alert(r);
      $.ajax({

        url:'deleteStudentinfo.php',
        type: 'post',
        data: {remove: r},
        success:function(data,status){
          $('#row'+r).hide();

        }
      })
    }

    </script>
