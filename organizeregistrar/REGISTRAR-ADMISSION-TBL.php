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

<div class="container py-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 align = "center">LIST OF ADMISSION APLICANTS</h1>
        </div>
        <div class="card-body">
          <?php
          include ("include/config.php");
          $sql= "SELECT * FROM `uccp_admission`";
          if($result = mysqli_query($conn,$sql)){}
            else{
              die($conn->error);

            }
            ?>

            <div class="table-responsive">
              <table class="table text-center cell-border table-hover" id="tbl">
                <thead>
                  <tr >

                    <th class="text-center" >STUDENT INFO</th>
                    <th class="text-center">STUDENT EDUCATIONAL BACKGROUND</th>
                    <th class="text-center">GUARDIAN INFO</th>
                    <th class="text-center">FIRST CHOICE COURSE</th>
                    <th class="text-center">VIEW</th>

                  </tr>
                </thead>
                <?php  while($row = mysqli_fetch_array($result)) { ?>
                  <tr id="row<?php echo $row['id'] ?>">

                    <td align="center"valign="center"><?php echo $row['name']; ?> <br> <?php echo $row['gender']; ?> <br> <?php echo $row['birthday']; ?> <br> <?php echo $row['address']; ?> <br>
                      <?php echo $row['email']; ?> <br> <?php echo $row['number']; ?> <br>
                    </td>
                    <td valign="center"> <?php echo $row['primary']; ?> <br> <?php echo $row['highschool']; ?> <br> <?php echo $row['shs']; ?> </td>
                    <td valign="center"> <?php echo $row['guardian']; ?> <br> <?php echo $row['g-Adress']; ?> <br> <?php echo $row['g-Contact']; ?></td>
                    <td valign="center"> <?php echo $row['firstchoice']; ?></td>

                    <td class="text-center align-middle"><button data-id='<?php echo $row['id'];?>' class="Requirements btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                      <button onclick="Accept(<?php echo $row['id'];?>)" class="btn btn-success"><i class="fa-sharp fa-solid fa-check"></i></button>
                      <button onclick="Reject(<?php echo $row['id'];?>)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                  <?php }?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div  id="empModal" class="modal fade"  role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">User Info</h4>
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

      var table = $('#tbl').DataTable();


      $('.Requirements').click(function(){
        var userid = $(this).data('id');
        $.ajax({
          url: 'View-Requirements.php',
          type: 'post',
          data: {userid: userid},
          success: function(response){
            $('.modal-body').html(response);
            $('#empModal').modal('show');
          }
        });
      });
    });


    function Reject(id){
      if(confirm('Are you sure you wantt to Reject This Applicant?')){
        $.ajax({
          url:'Reject-registrar.php',
          type:'post',
          data:{reject:id},
          success:function(data){
            $('#row'+id).hide('slow');
          }
        });
      }
      //final marks
    }


    function Accept(id){
      if(confirm("Are you Sure You Want to Accept This Applicant ?")){
        $.ajax({
          url: 'Accept-registrar.php' ,
          type: 'post',
          data: {accept1: id},
          success:function(data){
            $('#row'+id).hide('slow');
          },
        });
      }
    }
  </script>
