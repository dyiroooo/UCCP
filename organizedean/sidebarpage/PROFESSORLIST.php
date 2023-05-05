<!-- Modal -->
  <div class="modal fade" id="AddProfessor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CURRICULUM</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">

              <label for="Courses" class="form-label">Faculty</label>
              <input type="text" class="form-control" id="faculty" placeholder="ADD Faculty">

              <label for="Courses" class="form-label">First Name</label>
              <input type="text" class="form-control" id="fname" placeholder="ADD First Name">

              <label for="Courses" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lname" placeholder="ADD Last Name">

              <label for="Courses" class="form-label">Middle Name</label>
              <input type="text" class="form-control" id="mname" placeholder="ADD Middle Name">

              <label for="Courses" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="ADD Address">

              <label for="Courses" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" placeholder="ADD Email">

              <label for="Courses" class="form-label">Gender</label>
              <select class="form-control" name="" id="gender">
                <option value="" selected disabled>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>

              <label for="Courses" class="form-label">Contact Number</label>
              <input type="text" class="form-control" id="contact" placeholder="ADD Contact Number">

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="Addprof()">ADD</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Updaate Modal -->
    <div class="modal fade" id="Update_Prof" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="mb-3">

                <label for="Courses" class="form-label">Faculty</label>
                <input type="text" class="form-control" id="update_faculty" placeholder="ADD Faculty">

                <label for="Courses" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="update_fullname" placeholder="ADD First Name">


                <label for="Courses" class="form-label">Address</label>
                <input type="text" class="form-control" id="update_address" placeholder="ADD Address">

                <label for="Courses" class="form-label">Email</label>
                <input type="text" class="form-control" id="update_email" placeholder="ADD Email">

                <label for="Courses" class="form-label">Gender</label>
                <select class="form-control" name="" id="update_gender">
                  <option value="" selected disabled>Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <label for="Courses" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="update_contact" placeholder="ADD Contact Number">

              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"  onclick="updateProfessor()" data-bs-dismiss="modal">Update</button>
            <input type="hidden" id="hiddendataP">
          </div>
        </div>
      </div>
    </div>


 <div class="container my-3 ">
    <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h1 align = "center">PROFESSOR LIST</h1>
                </div>
                <div class="card-body">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary col-sm-2 mb-3" data-bs-toggle="modal" data-bs-target="#AddProfessor">
        <i class="fa fa-plus"></i>
      </button>

      <table id="professortbl" class="table text-center  cell-border table-striped table-hover" style="width:100%">
                <thead>
                    <tr align = "center">
                      <th class="text-center">Professor Details</th>
                      <th class="text-center">Faculty</th>
                      <th class="text-center">Operation</th>
                    </tr>
                </thead>
            </table>
            </div>
         </div>
     </div>
  </div>
</div>

  <script type="text/javascript">
  $(document).ready(function(){


    $('#professortbl').DataTable({
      'serverside':true,
      'processing':true,
      'paging':true,
      "columnDefs": [
       {"className": "dt-center", "targets": "_all"},
        { "width": "50%", "targets": 0 },
        { "width": "40%", "targets": 1 },
        { "width": "10%", "targets": 2 },
    ],

                  'ajax':{

                    'url': 'sidebarpage/professortbl.php',
                    'type':'post',

                  },
                  'fnCreateRow':function(nRow,aData,iDataIndex){
                    $(nRow).attr('id',aData[0]);
                  },

             });








 });



 function Addprof(){


      var faculty =$('#faculty').val();
      var fname =$('#fname').val();
      var lname =$('#lname').val();
      var mname =$('#mname').val();
      var address =$('#address').val();
      var email =$('#email').val();
      var gender =$('#gender').val();
      var contact =$('#contact').val();

    

      if( faculty,fname,lname,mname,address,email,gender,contact== ""){
        alert("Please fill out missing fields");
        $('#faculty').val('');
        $('#fname').val('');
        $('#lname').val('');
        $('#mname').val('');
        $('#address').val('');
        $('#email').val('');
        $('#gender').val('');
        $('#contact').val('');

        return false;
      }

        $.ajax({

            url:'sidebarpage/add-professor.php',
            type: 'post',
            data: {faculty: faculty , fname:fname ,lname:lname, mname:mname , address:address ,email:email,gender:gender, contact:contact},
            success:function(data,status){

              var json = JSON.parse(data);
              status = json.status;
              if(status =='success'){
              var c=  $('#professortbl').DataTable().ajax.reload();
              }
                  $('#faculty').val('');
                  $('#fname').val('');
                  $('#lname').val('');
                  $('#mname').val('');
                  $('#address').val('');
                  $('#email').val('');
                  $('#gender').val('');
                  $('#contact').val('');


            }
        })

  }

  function updateP(update){

$('#hiddendataP').val(update);
$.post("sidebarpage/update-prof.php",{update:update},function(data,
  status){
    var c = JSON.parse(data);

    $('#update_contact').val(c.contact);
    $('#update_gender').val(c.gender);
    $('#update_email').val(c.email);
    $('#update_address').val(c.address);
    $('#update_fullname').val(c.fullname);
    $('#update_faculty').val(c.faculty);

});
 $('#Update_Prof').modal("show");

   }

   function updateProfessor(){

        var hiddendataP = $('#hiddendataP').val();
        var c = $('#update_contact').val();
        var g = $('#update_gender').val();
        var e = $('#update_email').val();
        var a = $('#update_address').val();
        var f = $('#update_fullname').val();
        var fc = $('#update_faculty').val();



   $.post("sidebarpage/update-prof.php",{
    hiddendataP:hiddendataP , c:c, g:g, e:e, a:a, f:f, fc:fc
   },function(data,status){

     var json = JSON.parse(data);
     status = json.status;

     if(status =='success'){

  $('#professortbl').DataTable().ajax.reload();


     }
   });

   }

   function removeP(r){
           $.ajax({

               url:'sidebarpage/delete-prof.php',
               type: 'post',
               data: {removeP: r},
               success:function(data,status){

                 var json = JSON.parse(data);
                 status = json.status;
                 if(status =='success'){

               $('#professortbl').DataTable().ajax.reload();


                 }
               }
           })
     }







  </script>
