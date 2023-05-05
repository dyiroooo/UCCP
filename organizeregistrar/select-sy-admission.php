<?php

include ("include/config.php");

?>
  <select class="form-control text-center " name="choices"  id="choice" >
<?php

  $choices = $_POST['choices'];
    $sql="SELECT  schoolyear  FROM  `uccp_admission_schedule` order by schoolyear asc";
      $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_assoc($result)){
            echo '<option>'.$row['schoolyear'].'</option>';
          }
  ?>



