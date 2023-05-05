<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <center><h1>List of Paid Applicants</h1></center>
              </div>
                <div class="card-body" id="displayTable">

                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function(){
    //List Paid Applicants
    displayData();
    displayTableE();
  });

  function accept(id){
  alert(id);
  if(confirm("Are you Sure You Want to Accept This Applicant ?")){
          $.ajax({
              url: 'sidebarpage/acceptapplicant.php' ,
              type: 'post',
              data: {accept:id},
              success:function(data){
                    $('#row'+ id).hide('slow');
                    displayData();
              }
          });
  }
  }

  ///Paid Applicants
  function displayData(){
      var display ="true";
      $.ajax({
          url:'sidebarpage/table-paidapplicant.php',
          type: 'post',
          data: {display: display},
          success:function(data,status){
              $('#displayTable').html(data);
          }
      })
  }

</script>
