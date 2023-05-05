<?php
  include ("include/config.php");

  $x = $_POST['x'];


  $sql= "SELECT * FROM `uccp_enrollee` WHERE id=".$x;
  $result = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_array($result)){?>

    <table border="0" width='100%' >

      <tr align= center>
      <th><h1>PICTURE</h1></th>
      </tr>

      <tr align=center>
        <td width="300"><img src="../images/<?php echo $row['picture']; ?>" height="300"></td>
      </tr>

      <tr align= center>
      <th><h1>DIPLOMA</h1></th>
      </tr>

      <tr align=center>
        <td width="300"><img src="../images/<?php echo $row['diploma']; ?>" height="300"></td>
      </tr>

      <tr align= center>
      <th><h1>GOOD MORAL</h1></th>
      </tr>
      <tr align=center>

        <td width="300"><img src="../images/<?php echo $row['goodmoral']; ?>" height="300"></td>
      </tr>

      <tr align= center>
      <th><h1>PSA</h1></th>
      </tr>

      <tr align=center>
        <td width="300"><img src="../images/<?php echo $row['psa']; ?>" height="300"></td>
      </tr>

      <tr align= center>
      <th><h1>CARD</h1></th>
      </tr>

      <tr align=center>
        <td width="300"><img src="../images/<?php echo $row['card']; ?>" height="300"></td>
      </tr>


      <tr align= center>
      <th><h1>PROOF</h1></th>
      </tr>

      <tr align=center>
        <td width="300"><img src="../images/<?php echo $row['proof']; ?>" height="300"></td>
      </tr>
      
      
       <tr align= center>
      <th><h1>ERF</h1></th>
      </tr>

       <tr align=center>
        <td width="300"><img src="../images/<?php echo $row['erf']; ?>" height="300" alt="ERF"></td>
      </tr>

 <tr align= center>
      <th><h1>RECORDS</h1></th>
      </tr>

     <tr align=center>
        <td width="300"><img src="../images/<?php echo $row['records']; ?>" height="300" alt="RECORDS"></td>
      </tr>

  </table>

  <?php } ?>
