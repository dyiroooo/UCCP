<?php
include 'include/header.php';
include 'include/config.php';
?>
<!--<div class="d-flex" id="wrapper">-->
  <?php include 'include/sidebar.php'; ?>
  <div id="page-content-wrapper">
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
               <td  class="text-center align-middle">
               
                 <button class="student btn btn-primary" onclick="erf(<?php echo $row['id'];?>)"><i class="fa-solid fa-eye"></i></button>
                 
              </td>
                </tr>
           <?php }?>
       </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="student-erf" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ERFF</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div  id="erf-content" class="modal-body modal-bodyz print">
      </div>
      <div class="modal-footer form-control ">
   
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" onclick="printErf()">Print ERF</button>
    
  
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

 


  function erf(i){
    alert(i); 
    $.ajax({
      url: 'generateErf.php',
      type: 'post',
      data: {i:i},
      success: function(response){
        $('.modal-bodyz').html(response);
        $('#student-erf').modal('show');
      }
    });
  }

  function printErf() {


var printContents = document.getElementById('erf-content').innerHTML;  
var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;

window.print();
document.body.innerHTML = originalContents;
setTimeout(function() {
  
                location.reload();
           }, 0);







  }

</script>