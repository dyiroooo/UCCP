<?php
  include ("include/config.php");

  $userid = $_POST['userid'];


  $sql= "SELECT * FROM `uccp_admission` WHERE id='$userid'";
  $result = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_array($result)){?>

    <table border="0" width='100%' >

      <tr align= center>
      <th><h1>PSA</h1></th>
      </tr>

      <tr align=center>
        <td width="300"><img src="../images/<?php echo $row['requirements']; ?>" height="300"></td>
      </tr>

      <tr align= center>
      <th><h1>Picture</h1></th>
      </tr>

      <tr align=center>
        <td width="300"><img src="../images/<?php echo $row['picture']; ?>" height="300"></td>
      </tr>

      <tr align= center>
      <th><h1>Proof of residency</h1></th>
      </tr>
      <tr align=center>

        <td width="300"><img src="../images/<?php echo $row['proof']; ?>" height="300"></td>
      </tr>

      <tr align= center>
      <th><h1>FORM-138</h1></th>
      </tr>

      <tr align=center>
        <td width="300"><img src="../images/<?php echo $row['card']; ?>" height="300"></td>
      </tr>




  </table>

  <?php } ?>
