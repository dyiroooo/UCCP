<?php

include ("include/config.php");

  $s = $_POST['sy'];
  $sql= "SELECT * FROM `uccp_passers` WHERE `Schoolyear` = '$s';";
  $result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

  while($row= mysqli_fetch_array($result)){
 ?>
     <tr id="row<?php echo $row['id'] ?>">
         <td> <?php echo $row['Name']; ?></td>
         <td> <?php echo $row['Email']; ?></td>
         <td><button onclick="Email(<?php echo $row['id'];?>)" class="btn btn-primary"id="btns<?php echo $row['id'] ?>"><i class="fa-sharp fa-solid fa-envelope"></i></button></td>

     </tr>
   <?php
 }

}else {
  echo "No Records Found ";
}

 ?>
