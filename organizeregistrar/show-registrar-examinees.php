<?php

include ("include/config.php");

  $s = $_POST['sy'];
  // $s = 'Jiro';
  $sql= "SELECT * FROM `uccp_examinees` WHERE `category` = '$s';";
  $result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

  while($row= mysqli_fetch_array($result)){
 ?>
     <tr id="row<?php echo $row['id'] ?>">
       <br>
         <td> <?php echo $row['category']; ?></td>
         <br>
         <td> <?php echo $row['Email']; ?></td>

     </tr>
   <?php
 }

}else {
  echo "No Records Found ";
}

 ?>
