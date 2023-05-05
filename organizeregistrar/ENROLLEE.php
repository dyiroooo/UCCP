<?php
include 'include/header.php';
include 'include/config.php';
?>

<!-- <div class="d-flex" id="wrapper"> -->
  <?php include 'include/sidebar.php'; ?>
  <div class="" id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
      <div class="d-flex align-items-center">
        <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Registrar Dashboard</h2>
      </div>
    </nav>

  <div class="container my-3 ">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h1 class="text-center">ENROLLEE LIST</h1>
          </div>
          <div class="card-body">

            <?php
            $sql= "SELECT * FROM `uccp_enrollee`";
            $result= mysqli_query($conn,$sql);


            ?>

            <table class="table text-center cell-border table-hover" id="enrolee">
              <thead class = "text-center">

                <tr>
                  <th  class="text-center" >STUDENT INFO</th>
                  <th  class="text-center" >COURSE DETAILS</th>
                  <th  class="text-center" >OPERATIONS</th>

                </tr>

              </thead>

              <?php  while($row = mysqli_fetch_array($result)) {?>



                <tr id="row<?php echo $row['id'] ?>">
                  <td><?php echo $row['name'] ?><br><?php echo $row['gender'] ?> <br> <?php echo $row['birthday'] ?> <br> <?php echo $row['birthplace'] ?> <br> <?php echo $row['address']; ?> <br> <?php echo $row['email'] ?> <br><?php echo $row['phone'] ?></td>
                  <td align="center"valign="center"><?php echo $row['course'] ?> <br> <?php echo $row['year'] ?> <br><?php echo $row['sem'] ?> Semester <br> <?php echo $row['schoolyear'] ?></td>


                  <td  class="text-center align-middle" >
                    <button class="Requirementss btn btn-primary" onclick="view1(<?php echo $row['id'];?>)"><i class="fa-solid fa-eye"></i></button>
                    <button class="btn btn-success" onclick="accept1(<?php echo $row['id'];?>)"><i class="fa-sharp fa-solid fa-check"></i></button>
                    <button class="btn btn-danger" onclick="reject1(<?php echo $row['id'];?>)"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <?php
                }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div  id="empModal1" class="modal fade"  role="dialog">
      <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Requirements</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <?php
    include 'include/footer.php';
    ?>

    <script type="text/javascript">

    $(document).ready(function(){
      var enrolee = $('#enrolee').DataTable();

    });

    function reject1(r){
      alert(r);
      $.ajax({
        url:'remove-enrollee.php',
        type: 'post',
        data: {remove: r},
        success:function(data,status){
          $('#row'+r).hide();
        }
      });
    }

    function accept1(id){
      alert(id);
      if(confirm("Are you Sure You Want to Accept This Applicant ?")){

        $.ajax({
          url: 'Accept-enrollee.php' ,
          type: 'post',
          data: {accept1: id},
          success:function(data){
            $('#row'+id).hide('slow');
          }
        });
      }
    }

    function view1(x){
      $.ajax({
        url: 'View-Requirements-Enrollment.php',
        type: 'post',
        data: {x: x},
        success: function(response){
          $('.modal-body').html(response);
          $('#empModal1').modal('show');
        }
      });
    }

    </script>
