<?php

  include ("include/config.php");

?>
  <select class="form-control w-50 mx-auto my-3" name="choices1" id="choices1" >
  <option value="">SELECT Schoolyear</option>
<?php

  $choices = $_POST['choices1'];
    $sql="SELECT  schoolyear  FROM  `uccp_enrollment_schedule` order by schoolyear asc";
      $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_assoc($result)){
            echo '<option>'.$row['schoolyear'].'</option>';
          }
  ?>
  </select>

  <select class="form-control w-50 mx-auto my-3" name="sem" id="sem1">
      <option value="">SELECT SEM</option>
      <option value="1st">1st</option>
      <option value="2nd">2nd</option>
      <option value="Summer">Summer</option>
  </select>
