<?php
  include '../include/config.php';

  if(isset($_POST['acceptenroll'])){
    $id = $_POST['acceptenroll'];

    //  $query = "INSERT INTO `uccp_enrolled` (`id`, `name`, `gender`, `birthday`, `birthplace`, `email`, `phone`, `address`, `course`, `year`,`schoolyear`, `sem`, `picture`,
    //   `diploma`, `goodmoral`, `psa`, `card`, `proof`, `status`, `username`, `password`, `account_type`) SELECT `id`, `name`, `gender`,
    //   `birthday`, `birthplace` , `email`, `phone`, `address` , `course`, `year`, `schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`, `psa`, `card`, `proof`, `status`, `username`, `password`, `account_type` FROM `uccp_enrollment_billing`
    // WHERE id = '$id';";
    
    
    /////sa existing to
    
     $r = mysqli_query($conn, "SELECT * FROM uccp_enrolled WHERE id = '$id';"); ///validation only passers in ect can submit enrollment form
 $num_rowss = mysqli_num_rows($r);
    
    
    if($num_rowss > 0){
    
    $sqls= "SELECT * FROM `uccp_enrollment_billing`";
$resultzz = mysqli_query($conn,$sqls);

    while($r = mysqli_fetch_array($resultzz)){
        
        $schoolyear = $r['schoolyear'];
        $sem = $r['sem'];
        $year = $r['year'];
        $course = $r['course'];
        $name = $r['name'];
        $erf= $r['erf'];
        $records = $r['records'];
        $name = $r['name'];

      
            
    $sql1= "INSERT INTO `uccp_masterlist`(`id`, `name`, `gender`, `birthday`, `email`, `phone`, `course`, `year`, `section` ,`schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`, `psa`, `card`, `proof`,`erf`,`records`, `status`,`remarks`, 
    `username`, `password`, `account_type`) SELECT `id`, `name`, `gender`, `birthday`, `email`, `phone`, `course`, `year`,'',`schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`, `psa`, `card`, `proof`,`erf`,`records`, `status`,'', `username`, `password`, 
    `account_type` FROM `uccp_enrollment_billing` WHERE id = '$id';";
     $result= mysqli_query($conn,$sql1);
     
        $query = "INSERT INTO `uccp_accpaidenrollment`( `name`, `course`, `year`, `ornumber`, `status`) SELECT  `name`,`course`, `year`, `ornumber` ,`status` FROM `uccp_enrollment_billing` WHERE id ='$id'";
            mysqli_query($conn,$query);
     
     
       $query = "UPDATE `uccp_accpaidenrollment` SET status = 'Paid'  WHERE name = '$name';";
           mysqli_query($conn,$query);
           
      $queryx = "UPDATE `uccp_enrolled` SET schoolyear = '$schoolyear' , sem = '$sem' , year='$year' , course='$course', section ='',erf = '$erf', records ='$records' WHERE id = '$id';";
      mysqli_query($conn,$queryx); 
      

      
    //   $queryx = "UPDATE `uccp_masterlist` SET schoolyear = '$schoolyear' , sem = '$sem' , year='$year' , course='$course', section ='', remarks = '' WHERE id = '$id';";
    //   mysqli_query($conn,$queryx); 
      
     $queryss = "UPDATE `uccp_studentinfo` SET  schoolyear = '$schoolyear', sem= '$sem', year='$year' , course = '$course' ,section='' ,status = 'Enrolled',erf = '$erf', records ='$records'  WHERE id = '$id';";
      mysqli_query($conn,$queryss);
      
       
        
        $query1 = "DELETE FROM `uccp_enrollment_billing` WHERE id = '$id';";
        mysqli_query($conn,$query1);
    }
    
    }else{
    
    
    
  $sqlj= "SELECT * FROM `uccp_enrollment_billing`";
  $resultj = mysqli_query($conn,$sqlj);
  while($x = mysqli_fetch_array($resultj)){
      
      $fullname = $x['name'];
      $year = $x['year'];
      $sem= $x['sem'];
  }
  
  $sqlxx = mysqli_query($conn,"UPDATE `uccp_eval` SET remarks = 'F' WHERE name ='$fullname' AND year ='$year' AND sem = '$sem'");


    $sql = "INSERT INTO `uccp_enrolled` (`id`, `name`, `gender`, `birthday`, `birthplace`, `email`, `phone`, `address`, `course`, `year`, `section` , `schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`, `psa`, `card`, `proof`,`erf`,`records`, `status`, `username`, `password`, `account_type`) 
            SELECT `id`, `name`, `gender`, `birthday`, `birthplace` , `email`, `phone`, `address` , `course`, `year`, '' ,`schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`, `psa`, `card`, `proof`,`erf`,`records`, `status`, `username`, `password`, `account_type` 
            FROM `uccp_enrollment_billing` WHERE id = '$id';";
     mysqli_query($conn,$sql);

    
       $sql1= "INSERT INTO `uccp_masterlist`(`id`, `name`, `gender`, `birthday`, `email`, `phone`, `course`, `year`, `section` ,`schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`, `psa`, `card`, `proof`,`erf`,`records`, `status`,`remarks`, 
       `username`, `password`, `account_type`) SELECT `id`, `name`, `gender`, `birthday`, `email`, `phone`, `course`, `year`,'',`schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`, `psa`, `card`, `proof`,`erf`,`records`, `status`,'', `username`, `password`, `account_type` FROM `uccp_enrollment_billing` WHERE id = '$id';";
     $result= mysqli_query($conn,$sql1);


      $queryss = "UPDATE `uccp_studentinfo` SET status = 'Enrolled'  WHERE id = '$id';";
       mysqli_query($conn,$queryss);

         $query = "INSERT INTO `uccp_accpaidenrollment`(`id`, `name`, `course`, `year`, `ornumber`, `status`,`balance`) SELECT `id`, `name`,`course`, `year`, `ornumber` ,`status`,`balance` FROM `uccp_enrollment_billing` WHERE id ='$id'";
            mysqli_query($conn,$query);
            
        $querys = "UPDATE `uccp_enrolled` SET status = 'Enrolled'  WHERE id = '$id';";
         mysqli_query($conn,$querys);

          $query = "UPDATE `uccp_accpaidenrollment` SET status = 'Paid'  WHERE id = '$id';";
           mysqli_query($conn,$query);

        $query1 = "DELETE FROM `uccp_enrollment_billing` WHERE id = '$id';";
        mysqli_query($conn,$query1);
    }
      }
   ?>
