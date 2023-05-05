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

    <?php
    include ("include/config.php");
    $q = "SELECT  DISTINCT schoolyear  FROM `uccp_admission_schedule` ";
    $results = mysqli_query($conn,$q);
    ?>
    <div class="container py-3">
      <div class="row">
        <div class="col-md-12">
          <div class="container">


          <div class="card">
            <div class="card-header">
              <h1 align = "center">LIST OF PASSERS</h1>
              <div class="mb-4 text-center mt-4 ">
                <select class="" name="SY" id="schoolyear" >
                  <option value="">Select</option>
                  <?php
                  while($r = mysqli_fetch_assoc($results)){
                    echo '<option>'.$r['schoolyear'].'</option>';;
                  }
                  ?>
                </select>
              </div>
            </div>
            <ol class="breadcrumb mb-4 justify-content-center">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol></center>
            <div class="card-body">
              <?php

              $sql= "SELECT * FROM `uccp_passers`";
              $result = mysqli_query($conn,$sql);
              if(mysqli_num_rows($result)>0){
                ?>
                <div class="table-responsive-lg">
                  <table class="table text-center cell-border table-bordered table-hover " id="passers" style="width:100%" >
                    <thead>
                      <tr align = "center">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Schoolyear</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  while($row= mysqli_fetch_array($result)){ ?>

                        <tr id="row<?php echo $row['id'] ?>">
                          <td width="50%"> <?php echo $row['Name']; ?></td>
                          <td width="30%"> <?php echo $row['Email']; ?></td>
                          <td width="30%"> <?php echo $row['Schoolyear']; ?></td>
                          <td width="10%"><button onclick="Email(<?php echo $row['id'];?>)" class="btn btn-primary"id="btns<?php echo $row['id'] ?>"><i class="fa-sharp fa-solid fa-envelope"></i></button></td>
                        </tr>
                      <?php }}?>
                    </tbody>
                  </table>
                  <button  class="btn btn-primary" id="btnbulk" ><i class="fa-sharp fa-solid fa-envelopes-bulk"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>

      <?php
      include 'include/config.php';
      ?>

      <script type="text/javascript">
      $( document ).ready(function() {
        $("#btnbulk").prop("disabled",true);
        var table =  $('#passers').DataTable();



        ///experiment ni gelo at gumana
        $('input[type="search"]').on( 'keyup', function () {
          var s =($(this).val());


          if(s == ""){
            $('#schoolyear').val('').change();
            $("#btnbulk").prop("disabled",true);

          }

        } );

        table.column( 2 ).visible( false );

        $('#schoolyear').on('change', function () {

          var sy = $(this).val();
          if(sy==""){
            $("#btnbulk").prop("disabled",true);
          }else {
            $("#btnbulk").prop("disabled",false);
          }
          table.search( this.value ).draw();


        } );

      });

      function Email(id){
        if(confirm("Are you Sure You Want to Accept This Applicant ?")){

          $.ajax({

            url: 'registrar-single-email-passer.php',
            type: 'post',
            data: {email: id , },
            success:function(data){
              $('#btns'+id).text('DONE');
              $('#row'+id).css('background-color', 'gray');
            },
          });
        }
      }

      $("#btnbulk").click(function(e) {
        var x =$('#schoolyear').val();

        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "Send-Bulk-Email.php",
          data: {
            id: $(this).val() ,sy:x
          },
          beforeSend:function(){
            $('#btnbulk').html('Sending...');
            $('#btnbulk').addClass('btn-danger');},
            success: function(result) {
              alert("SENT SUCCESSFULLY")
              $('#btnbulk').removeClass('btn-danger');
              $('#btnbulk').text('Email ALL');
            },
            error: function(result) {
              alert('error');
            }
          });
        });

        function schoolyear(){


          var s = document.getElementById("schoolyear").value;
          $.ajax({
            url: "show-registrar-passers.php",
            type: "post",
            data: {sy:s},
            success:function(data){
              $('#display').html(data);
            }
          });
        }
        </script>
