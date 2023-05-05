<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <center><h1>List of Paid Enrollees</h1></center>
              </div>
                <div class="card-body" id="displayTableE">

                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function(){
    //List Paid Applicants
    displayTableE();
  });

function E(id){
  alert(id);
  if(confirm("Are you Sure You Want to Accept This Enrollee ?")){
          $.ajax({
              url: 'sidebarpage/acceptenrollee.php' ,
              type: 'post',
              data: {accept:id},
              success:function(data){
                    $('#row'+id).hide('slow');
                    displayTableE();
              }
          });
  }
}

function displayTableE(){
    var display ="true";
    $.ajax({
        url:'sidebarpage/table-paidenrollee.php',
        type: 'post',
        data: {display: display},
        success:function(data,status){
            $('#displayTableE').html(data);
        }
    })
}

</script>
