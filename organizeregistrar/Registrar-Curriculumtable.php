 <?php
     include ("include/config.php");
     $sql= "SELECT * FROM `uccp_curriculum` WHERE Status = 'PENDING';";
     $result= mysqli_query($conn,$sql);

     
     $rows = array();
     $data = array();
     while ($row = mysqli_fetch_array($result)) {

       $id = $row['id'];
       $Schoolyear = $row['Schoolyear'];
       $Course = $row['Course'];
       $Year = $row['Year'];
       $Subcode = $row['Subcode'];
       $DESCRIPTION = $row['Description'];
       $Units = $row['Units'];
       $Status = $row['Status'];
       $Sem = $row['Sem'];
       
       

     $subarray= array();
     $subarray[]= '<td>'.$Schoolyear.'  </td>';
        $subarray[]= '<td>'.$Course.'  <br> '.$Year.' </td>';
           $subarray[]= '<td>'.$Subcode.'  <br> '.$DESCRIPTION.'   </td>';
           $subarray[]= '<td>'.$Sem.' </td>';
           $subarray[]= '<td>'.$Units.' </td>';
           $subarray[]= '<td><font color="Red"><strong>'.$Status.'</strong></font> </td>';
           $subarray[]=   '  <td>
            <button class="btn btn-primary" onclick="AcceptR('.$row['id'].')"><i class="fa-sharp fa-solid fa-check"></i></button>
            <button class="btn btn-danger" onclick="RejectR('.$row['id'].')"><i class="fa-sharp fa-solid fa-trash"></i></button>
            </td>';
     $data[]=$subarray;
     }
     $output = array(
       'data'=>$data,
     );
     echo json_encode($output);

  ?>
