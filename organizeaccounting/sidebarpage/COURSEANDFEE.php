<!-- Course And Fees -->
  <div class="container-fluid">
    <div class="col-lg-12">
      <div class="row">
        <!-- FORM Panel -->
        <!-- Table Panel -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <center><h1>List of Courses & Fees</h1></center>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary col-sm-2 mb-2 float-end" data-bs-toggle="modal" data-bs-target="#addcoursefee">
                  <i class="fa fa-plus"></i></button>
              <form class="" action="" method="post">
                <table id="coursefeelist" class="table table-condensed table-bordered cell-border table-hover table-responsive">
                  <thead>
                    <tr>
                      <th scope="col">Fee Type</th>
                      <th scope="col">Amount</th>
                      <th scope="col" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM uccp_coursefee";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run)>0) {
                      while ($course = mysqli_fetch_array($query_run)){
                        ?>
                        <tr>
                          <td><?= $course['type']?></td>
                          <td><?= $course['price']?>.00</td>
                          <td class="text-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <button type="button" id="<?= $course['id']?>" class="btn btn-success courseupdate"><i class="fa-sharp fa-solid fa-pen"></i></button>
                              <button type="button" id="<?= $course['id']?>" name="coursefeeremove" class="btn btn-danger deletedata"><i class="fa-sharp fa-solid fa-trash"></i></button>
                            </div>
                          </td>
                        </tr>
                        <?php
                      }
                    } else {
                      echo "<h5> No Record Found</h5>";
                    }
                     ?>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
        <!-- Table Panel -->
      </div>
    </div>
    </div>

    <!-- Start of Modal for Adding Course Fee -->
    <div class="modal fade" id="addcoursefee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course and Fee</h1>
            </div>
            <form id="addfeeform">
              <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Type</label>
                  <input type="text" class="form-control" id="feetype" name="feetype" required>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Amount</label>
                  <input type="number" class="form-control" id="totalprice" name="totalprice" required >
                </div>

              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btnadd" name="btnadd" data-bs-dismiss="modal">Add</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    <!-- End of Modal for Adding Course Fee  -->

    <!-- Edit Course Fee  Modal Start-->
    <div class="modal fade" id="updatecoursesfee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="" action="#" method="post" id="updatefeeform">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Course and Fee</h5>
          </div>
          <div class="modal-body" id="coursefee_update">

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="button" id="updatebtn" name="btnupdate" class="btn btn-primary pull-right">Update</Button>
          </div>
        </div>
      </div>
    </div>
    <!-- Edit Modal Course Fee  End -->


  <!-- Delete Course Fee  Modal Start -->
  <div class="modal fade" id="deletecoursefee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="#" method="post" id="deletefeeform">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Course Fee</h5>
        </div>
        <div class="modal-body" id="coursefee_delete">

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" id="deletedetail" name="btndelete" class="btn btn-primary pull-right">Delete</Button>
        </div>
      </div>
    </div>
  </div>
<!-- Delete Course Fee  Modal End -->

<script>


$(document).ready(function(){

$('#coursefeelist').DataTable({
  'serverside':true,
  'processing':true,
  'paging':true,
  "columnDefs": [
    {"className": "dt-center", "targets": "_all"},

  ],

  'ajax':{

    'url': 'sidebarpage/table-coursefee.php',
    'type':'post',

  },
  'fnCreateRow':function(nRow,aData,iDataIndex){
    $(nRow).attr('id',aData[0]);
  },
});
});


    $(document).ready(function(){
      $(document).on('click', '#btnadd', function(){
        var type=$("#feetype").val();
        var courses=$("#courses").val();
        var yearlevel=$("#yearlevel").val();
        var totalprice=$("#totalprice").val();
            $.ajax({
              url: "sidebarpage/addcoursefee.php",
              type: "post",
              data: {type:type, courses:courses, yearlevel:yearlevel, totalprice:totalprice},
              success:function(data){
                $("#addcoursefee").modal('hide');
                // location.reload();
                var c =  $('#coursefeelist').DataTable().ajax.reload();
              }
            });
      });
    });

    //update view
    $(document).on('click', '.courseupdate', function(){
      var update_id = $(this).attr('id');
      $.ajax({
        url: "sidebarpage/updatedetails.php",
        type: "post",
        data: {update_id: update_id},
        success: function(data){
          $("#coursefee_update").html(data);
          $("#updatecoursesfee").modal('show');
        }
      });
      //update button
      $(document).on('click', '#updatebtn', function(){
        $.ajax({
          url: "sidebarpage/updatecoursefee.php",
          type: "post",
          data: $("#updatefeeform").serialize(),
          success: function(data){
            $("#updatecoursesfee").modal("hide");
            //location.reload();
            var a =  $('#coursefeelist').DataTable().ajax.reload();
          }
        });
      });
    });

    //REMOVE
        $(document).on('click', '.deletedata', function(){
          var deletedetails_id = $(this).attr('id');
          $.ajax({
            url: "sidebarpage/deletedetails.php",
            type: "post",
            data: {deletedetails_id: deletedetails_id},
            success: function(data){
              $("#coursefee_delete").html(data);
              $("#deletecoursefee").modal('show');
            }
          });
          $(document).on('click', '#deletedetail', function(){
            $.ajax({
              url: "sidebarpage/deletecoursefee.php",
              type: "post",
              data: $("#deletefeeform").serialize(),
              success: function(data){
                $("#deletecoursefee").modal("hide");
                // location.reload();
                var b =  $('#coursefeelist').DataTable().ajax.reload();
              }
            });
          });
        });
</script>
