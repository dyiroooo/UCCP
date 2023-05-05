
 <?php
 include ("../include/config.php");

 $result = mysqli_query($conn,"SELECT * FROM `uccp_approvedcurriculum` WHERE Status ='APPROVED';");

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
   $Sem= $row['Sem'];
   $Availability = $row['availability'];
  

 $subarray= array();

 $subarray[]= '<td>'.$Schoolyear.'  </td>';
    $subarray[]= '<td>'.$Course.'  <br> '.$Year.' </td>';
       $subarray[]= '<td>'.$Subcode.'  <br> '.$DESCRIPTION.'  <br> '.$Units.' </td>';
       $subarray[]= '<td>'.$Sem.' </td>';
          $subarray[]= '<td>'.$Units.' </td>';
      
          $subarray[]= '<td><font color="Green"><strong>'.$Status.'</strong></font> </td>';
          $subarray[]= '<td><font color=""><strong>'.$Availability.'</strong></font> </td>';
            
          $subarray[]=   '  <td>
          <button class="btn btn-success" onclick="setA('.$row['id'].')"><i class="fa-sharp fa-solid fa-pen"></i></button>
        
       
          </td>';
       
 

 $data[]=$subarray;
 }


 $output = array(
   'data'=>$data,


 );

 echo json_encode($output);




  ?>
